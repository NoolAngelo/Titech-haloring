/**
 * Cloudflare Worker for Halo Ring Backend Processing
 * Handles contact forms, waitlist submissions, and email notifications
 */

// CORS headers for cross-origin requests
const corsHeaders = {
  "Access-Control-Allow-Origin": "*",
  "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, OPTIONS",
  "Access-Control-Allow-Headers": "Content-Type, Authorization",
  "Access-Control-Max-Age": "86400",
};

// Email templates
const EMAIL_TEMPLATES = {
  waitlist: {
    subject: "Welcome to Halo Ring Waitlist! 🎉",
    html: `
      <div style="font-family: 'Poppins', Arial, sans-serif; max-width: 600px; margin: 0 auto; background: #ffffff;">
        <div style="background: linear-gradient(135deg, #fabc6b 0%, #f59e0b 100%); padding: 40px 20px; text-align: center;">
          <h1 style="color: white; margin: 0; font-size: 28px; font-weight: bold;">Welcome to Halo Ring!</h1>
          <p style="color: white; margin: 10px 0 0; font-size: 16px;">You're now on our exclusive waitlist</p>
        </div>
        <div style="padding: 40px 20px;">
          <h2 style="color: #1f2937; margin-bottom: 20px;">Thank you for joining us!</h2>
          <p style="color: #4b5563; line-height: 1.6; margin-bottom: 20px;">
            We're excited to have you on board! You'll be among the first to know when Halo Ring launches in the Philippines.
          </p>
          <div style="background: #f9fafb; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3 style="color: #1f2937; margin-top: 0;">What's Next?</h3>
            <ul style="color: #4b5563; line-height: 1.6;">
              <li>We'll send you updates about our launch progress</li>
              <li>You'll get early access to pre-orders</li>
              <li>Exclusive pricing for waitlist members</li>
            </ul>
          </div>
          <p style="color: #4b5563; line-height: 1.6;">
            Questions? Reply to this email or visit our website for more information.
          </p>
        </div>
        <div style="background: #f3f4f6; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
          <p style="color: #6b7280; margin: 0; font-size: 14px;">
            © 2024 Halo Ring - TiTech. All rights reserved.
          </p>
        </div>
      </div>
    `,
  },
  contact: {
    subject: "New Contact Form Submission - Halo Ring",
    html: (data) => `
      <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2 style="color: #1f2937;">New Contact Form Submission</h2>
        <div style="background: #f9fafb; padding: 20px; border-radius: 8px;">
          <p><strong>Name:</strong> ${data.name}</p>
          <p><strong>Email:</strong> ${data.email}</p>
          <p><strong>Phone:</strong> ${data.phone || "Not provided"}</p>
          <p><strong>Subject:</strong> ${data.subject}</p>
          <p><strong>Message:</strong></p>
          <div style="background: white; padding: 15px; border-radius: 4px; margin-top: 10px;">
            ${data.message}
          </div>
        </div>
        <p style="color: #6b7280; font-size: 14px; margin-top: 20px;">
          Submitted at: ${new Date().toLocaleString()}
        </p>
      </div>
    `,
  },
};

// Validation functions
function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function sanitizeInput(input) {
  if (typeof input !== "string") return input;
  return input.trim().slice(0, 1000); // Limit length and trim
}

// Rate limiting using KV
async function checkRateLimit(env, ip, endpoint) {
  const key = `ratelimit:${endpoint}:${ip}`;
  const current = await env.HALO_DB.get(key);
  const limit = endpoint === "contact" ? 5 : 10; // 5 contact forms, 10 waitlist per hour

  if (current && parseInt(current) >= limit) {
    return false;
  }

  const newCount = current ? parseInt(current) + 1 : 1;
  await env.HALO_DB.put(key, newCount.toString(), { expirationTtl: 3600 }); // 1 hour
  return true;
}

// Email sending function (using Resend API)
async function sendEmail(env, to, template, data = {}) {
  if (!env.EMAIL_API_KEY) {
    console.log("Email API key not configured, skipping email send");
    return { success: false, error: "Email not configured" };
  }

  const emailData = {
    from: "Halo Ring <noreply@your-domain.com>",
    to: Array.isArray(to) ? to : [to],
    subject: EMAIL_TEMPLATES[template].subject,
    html:
      typeof EMAIL_TEMPLATES[template].html === "function"
        ? EMAIL_TEMPLATES[template].html(data)
        : EMAIL_TEMPLATES[template].html,
  };

  try {
    const response = await fetch("https://api.resend.com/emails", {
      method: "POST",
      headers: {
        Authorization: `Bearer ${env.EMAIL_API_KEY}`,
        "Content-Type": "application/json",
      },
      body: JSON.stringify(emailData),
    });

    if (!response.ok) {
      throw new Error(`Email API error: ${response.status}`);
    }

    return { success: true, data: await response.json() };
  } catch (error) {
    console.error("Email send error:", error);
    return { success: false, error: error.message };
  }
}

// Waitlist handler
async function handleWaitlist(request, env) {
  try {
    const data = await request.json();
    const email = sanitizeInput(data.email);

    // Validation
    if (!email || !validateEmail(email)) {
      return new Response(
        JSON.stringify({
          success: false,
          error: "Valid email address is required",
        }),
        {
          status: 400,
          headers: { ...corsHeaders, "Content-Type": "application/json" },
        }
      );
    }

    // Rate limiting
    const clientIP = request.headers.get("CF-Connecting-IP") || "unknown";
    const rateLimitOk = await checkRateLimit(env, clientIP, "waitlist");

    if (!rateLimitOk) {
      return new Response(
        JSON.stringify({
          success: false,
          error: "Too many requests. Please try again later.",
        }),
        {
          status: 429,
          headers: { ...corsHeaders, "Content-Type": "application/json" },
        }
      );
    }

    // Check if email already exists
    const existingEmail = await env.HALO_DB.get(`waitlist:${email}`);
    if (existingEmail) {
      return new Response(
        JSON.stringify({
          success: false,
          error: "Email already registered on waitlist",
        }),
        {
          status: 409,
          headers: { ...corsHeaders, "Content-Type": "application/json" },
        }
      );
    }

    // Store in KV
    const waitlistData = {
      email,
      timestamp: new Date().toISOString(),
      ip: clientIP,
      userAgent: request.headers.get("User-Agent") || "unknown",
    };

    await env.HALO_DB.put(`waitlist:${email}`, JSON.stringify(waitlistData));

    // Increment counter
    const currentCount = (await env.HALO_DB.get("waitlist:count")) || "0";
    await env.HALO_DB.put(
      "waitlist:count",
      (parseInt(currentCount) + 1).toString()
    );

    // Send welcome email
    await sendEmail(env, email, "waitlist");

    // Send notification to admin
    if (env.ADMIN_EMAIL) {
      await sendEmail(env, env.ADMIN_EMAIL, "contact", {
        name: "Waitlist Notification",
        email: email,
        subject: "New Waitlist Signup",
        message: `New user joined the waitlist: ${email}`,
      });
    }

    return new Response(
      JSON.stringify({
        success: true,
        message: "Successfully added to waitlist!",
      }),
      {
        headers: { ...corsHeaders, "Content-Type": "application/json" },
      }
    );
  } catch (error) {
    console.error("Waitlist error:", error);
    return new Response(
      JSON.stringify({
        success: false,
        error: "Internal server error",
      }),
      {
        status: 500,
        headers: { ...corsHeaders, "Content-Type": "application/json" },
      }
    );
  }
}

// Contact form handler
async function handleContact(request, env) {
  try {
    const data = await request.json();

    // Sanitize inputs
    const contactData = {
      name: sanitizeInput(data.name),
      email: sanitizeInput(data.email),
      phone: sanitizeInput(data.phone),
      subject: sanitizeInput(data.subject),
      message: sanitizeInput(data.message),
    };

    // Validation
    if (
      !contactData.name ||
      !contactData.email ||
      !contactData.subject ||
      !contactData.message
    ) {
      return new Response(
        JSON.stringify({
          success: false,
          error: "Name, email, subject, and message are required",
        }),
        {
          status: 400,
          headers: { ...corsHeaders, "Content-Type": "application/json" },
        }
      );
    }

    if (!validateEmail(contactData.email)) {
      return new Response(
        JSON.stringify({
          success: false,
          error: "Valid email address is required",
        }),
        {
          status: 400,
          headers: { ...corsHeaders, "Content-Type": "application/json" },
        }
      );
    }

    // Rate limiting
    const clientIP = request.headers.get("CF-Connecting-IP") || "unknown";
    const rateLimitOk = await checkRateLimit(env, clientIP, "contact");

    if (!rateLimitOk) {
      return new Response(
        JSON.stringify({
          success: false,
          error: "Too many requests. Please try again later.",
        }),
        {
          status: 429,
          headers: { ...corsHeaders, "Content-Type": "application/json" },
        }
      );
    }

    // Store in KV with timestamp
    const submissionId = `contact:${Date.now()}:${Math.random()
      .toString(36)
      .substr(2, 9)}`;
    const submissionData = {
      ...contactData,
      timestamp: new Date().toISOString(),
      ip: clientIP,
      id: submissionId,
    };

    await env.HALO_DB.put(submissionId, JSON.stringify(submissionData));

    // Send emails
    const adminEmail = env.ADMIN_EMAIL || "admin@your-domain.com";
    await sendEmail(env, adminEmail, "contact", contactData);

    // Send confirmation to user
    await sendEmail(env, contactData.email, "waitlist"); // You can create a separate contact confirmation template

    return new Response(
      JSON.stringify({
        success: true,
        message: "Message sent successfully! We'll get back to you soon.",
      }),
      {
        headers: { ...corsHeaders, "Content-Type": "application/json" },
      }
    );
  } catch (error) {
    console.error("Contact form error:", error);
    return new Response(
      JSON.stringify({
        success: false,
        error: "Internal server error",
      }),
      {
        status: 500,
        headers: { ...corsHeaders, "Content-Type": "application/json" },
      }
    );
  }
}

// Get waitlist stats (admin endpoint)
async function getStats(request, env) {
  try {
    // Simple admin authentication (you might want to improve this)
    const authHeader = request.headers.get("Authorization");
    if (!authHeader || authHeader !== `Bearer ${env.ADMIN_TOKEN}`) {
      return new Response(JSON.stringify({ error: "Unauthorized" }), {
        status: 401,
        headers: { ...corsHeaders, "Content-Type": "application/json" },
      });
    }

    const waitlistCount = (await env.HALO_DB.get("waitlist:count")) || "0";

    return new Response(
      JSON.stringify({
        success: true,
        stats: {
          waitlistCount: parseInt(waitlistCount),
          lastUpdated: new Date().toISOString(),
        },
      }),
      {
        headers: { ...corsHeaders, "Content-Type": "application/json" },
      }
    );
  } catch (error) {
    console.error("Stats error:", error);
    return new Response(
      JSON.stringify({
        success: false,
        error: "Internal server error",
      }),
      {
        status: 500,
        headers: { ...corsHeaders, "Content-Type": "application/json" },
      }
    );
  }
}

// Main request handler
export default {
  async fetch(request, env, ctx) {
    const url = new URL(request.url);
    const path = url.pathname;

    // Handle CORS preflight requests
    if (request.method === "OPTIONS") {
      return new Response(null, {
        headers: corsHeaders,
      });
    }

    // Route requests
    if (request.method === "POST") {
      switch (path) {
        case "/api/waitlist":
          return handleWaitlist(request, env);
        case "/api/contact":
          return handleContact(request, env);
        default:
          return new Response(JSON.stringify({ error: "Not found" }), {
            status: 404,
            headers: { ...corsHeaders, "Content-Type": "application/json" },
          });
      }
    }

    if (request.method === "GET") {
      switch (path) {
        case "/api/stats":
          return getStats(request, env);
        case "/api/health":
          return new Response(
            JSON.stringify({
              status: "healthy",
              timestamp: new Date().toISOString(),
            }),
            {
              headers: { ...corsHeaders, "Content-Type": "application/json" },
            }
          );
        default:
          return new Response(JSON.stringify({ error: "Not found" }), {
            status: 404,
            headers: { ...corsHeaders, "Content-Type": "application/json" },
          });
      }
    }

    return new Response(JSON.stringify({ error: "Method not allowed" }), {
      status: 405,
      headers: { ...corsHeaders, "Content-Type": "application/json" },
    });
  },
};
