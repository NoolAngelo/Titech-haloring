/**
 * Contact Form Animations and Backend Integration
 * Enhanced with Cloudflare Workers support
 */

// Configuration - Update this with your actual Worker URL
const WORKER_URL = "https://your-worker-url.workers.dev"; // Replace with your actual Worker URL

document.addEventListener("DOMContentLoaded", function () {
  // Form field animations
  const formGroups = document.querySelectorAll(".form-group");

  formGroups.forEach((group) => {
    const input = group.querySelector("input, textarea");
    if (input) {
      // Focus animation
      input.addEventListener("focus", () => {
        group.classList.add("focused");
      });

      // Blur animation (keep focused if has value)
      input.addEventListener("blur", () => {
        if (!input.value.trim()) {
          group.classList.remove("focused");
        }
      });

      // Check for pre-filled values
      if (input.value.trim()) {
        group.classList.add("focused");
      }
    }
  });

  // Enhanced contact form submission with backend integration
  const contactForm = document.querySelector("#contact-form");
  if (contactForm) {
    contactForm.addEventListener("submit", async function (e) {
      e.preventDefault();

      const submitButton = this.querySelector('button[type="submit"]');
      const originalButtonText = submitButton.innerHTML;

      // Get form data
      const formData = new FormData(this);
      const data = {
        name: formData.get("name")?.trim(),
        email: formData.get("email")?.trim(),
        phone: formData.get("phone")?.trim(),
        subject: formData.get("subject")?.trim(),
        message: formData.get("message")?.trim(),
      };

      // Basic validation
      if (!data.name || !data.email || !data.subject || !data.message) {
        showContactMessage("Please fill in all required fields.", "error");
        return;
      }

      // Email validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(data.email)) {
        showContactMessage("Please enter a valid email address.", "error");
        return;
      }

      // Disable submit button and show loading
      submitButton.disabled = true;
      submitButton.innerHTML = '<span class="loading"></span> Sending...';

      try {
        const response = await fetch(`${WORKER_URL}/api/contact`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        });

        const result = await response.json();

        if (result.success) {
          // Success
          this.reset();

          // Reset form animations
          formGroups.forEach((group) => {
            group.classList.remove("focused");
          });

          showContactMessage(result.message, "success");

          // Store locally as backup
          const contactSubmissions = JSON.parse(
            localStorage.getItem("contactSubmissions") || "[]"
          );
          contactSubmissions.push({
            ...data,
            timestamp: new Date().toISOString(),
            synced: true,
          });
          localStorage.setItem(
            "contactSubmissions",
            JSON.stringify(contactSubmissions)
          );
        } else {
          showContactMessage(
            result.error || "Something went wrong. Please try again.",
            "error"
          );
        }
      } catch (error) {
        console.error("Network error:", error);
        showContactMessage(
          "Network error. Please check your connection and try again.",
          "error"
        );

        // Fallback: store locally if network fails
        const contactSubmissions = JSON.parse(
          localStorage.getItem("contactSubmissions") || "[]"
        );
        contactSubmissions.push({
          ...data,
          timestamp: new Date().toISOString(),
          synced: false,
        });
        localStorage.setItem(
          "contactSubmissions",
          JSON.stringify(contactSubmissions)
        );

        this.reset();
        formGroups.forEach((group) => {
          group.classList.remove("focused");
        });

        showContactMessage(
          "Message stored locally. We'll send it when connection is restored.",
          "success"
        );
      } finally {
        // Re-enable submit button
        submitButton.disabled = false;
        submitButton.innerHTML = originalButtonText;
      }
    });
  }
});

// Enhanced message display function for contact form
function showContactMessage(message, type) {
  // Remove any existing messages
  const existingMessage = document.querySelector(".contact-form-message");
  if (existingMessage) {
    existingMessage.remove();
  }

  // Create new message element
  const messageElement = document.createElement("div");
  messageElement.className = `contact-form-message p-4 mt-4 text-sm rounded-lg transition-all duration-300 ${
    type === "success"
      ? "bg-green-100 text-green-800 border border-green-200"
      : "bg-red-100 text-red-800 border border-red-200"
  }`;

  // Add icon
  const icon = type === "success" ? "✓" : "⚠";
  messageElement.innerHTML = `
        <div class="flex items-center">
            <span class="mr-2 text-lg">${icon}</span>
            <span>${message}</span>
        </div>
    `;

  // Insert the message after the form
  const form = document.querySelector("#contact-form");
  if (form) {
    form.parentNode.insertBefore(messageElement, form.nextSibling);

    // Scroll message into view
    messageElement.scrollIntoView({
      behavior: "smooth",
      block: "nearest",
    });

    // Auto-remove after 8 seconds
    setTimeout(() => {
      messageElement.style.opacity = "0";
      messageElement.style.transform = "translateY(-10px)";
      setTimeout(() => {
        if (messageElement.parentNode) {
          messageElement.remove();
        }
      }, 300);
    }, 8000);
  }
}

// Sync offline submissions when connection is restored
function syncOfflineSubmissions() {
  if (navigator.onLine) {
    // Sync waitlist submissions
    const waitlistEmails = JSON.parse(
      localStorage.getItem("waitlistEmails") || "[]"
    );
    const unsyncedWaitlist = waitlistEmails.filter((item) => !item.synced);

    unsyncedWaitlist.forEach(async (item) => {
      try {
        const response = await fetch(`${WORKER_URL}/api/waitlist`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ email: item.email }),
        });

        if (response.ok) {
          // Mark as synced
          item.synced = true;
          localStorage.setItem(
            "waitlistEmails",
            JSON.stringify(waitlistEmails)
          );
        }
      } catch (error) {
        console.error("Failed to sync waitlist item:", error);
      }
    });

    // Sync contact submissions
    const contactSubmissions = JSON.parse(
      localStorage.getItem("contactSubmissions") || "[]"
    );
    const unsyncedContacts = contactSubmissions.filter((item) => !item.synced);

    unsyncedContacts.forEach(async (item) => {
      try {
        const response = await fetch(`${WORKER_URL}/api/contact`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            name: item.name,
            email: item.email,
            phone: item.phone,
            subject: item.subject,
            message: item.message,
          }),
        });

        if (response.ok) {
          // Mark as synced
          item.synced = true;
          localStorage.setItem(
            "contactSubmissions",
            JSON.stringify(contactSubmissions)
          );
        }
      } catch (error) {
        console.error("Failed to sync contact item:", error);
      }
    });
  }
}

// Listen for online events to sync offline submissions
window.addEventListener("online", syncOfflineSubmissions);

// Try to sync on page load if online
if (navigator.onLine) {
  syncOfflineSubmissions();
}
