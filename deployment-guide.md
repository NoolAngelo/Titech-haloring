# Cloudflare Workers Deployment Guide for Halo Ring

This guide will help you deploy the Cloudflare Workers backend for your Halo Ring website.

## 📋 Prerequisites

1. **Cloudflare Account** - Sign up at [cloudflare.com](https://cloudflare.com)
2. **Node.js** (v18 or later) - [Download here](https://nodejs.org/)
3. **Git** - For version control
4. **Email Service** - We recommend [Resend](https://resend.com/) for sending emails

## 🚀 Quick Setup

### 1. Install Wrangler CLI

```bash
npm install -g wrangler
```

### 2. Authenticate with Cloudflare

```bash
wrangler auth login
```

This will open your browser to authenticate with Cloudflare.

### 3. Install Dependencies

```bash
npm install
```

### 4. Create KV Namespace

```bash
# Create production KV namespace
npm run kv:create

# Create preview KV namespace for development
npm run kv:create:preview
```

Copy the namespace IDs from the output and update `wrangler.toml`:

```toml
[[kv_namespaces]]
binding = "HALO_DB"
id = "your_production_kv_namespace_id"
preview_id = "your_preview_kv_namespace_id"
```

### 5. Set Environment Variables

Update `wrangler.toml` with your domain:

```toml
[vars]
CORS_ORIGIN = "https://your-actual-domain.com"
```

### 6. Set Secrets

```bash
# Email API key (from Resend or similar service)
wrangler secret put EMAIL_API_KEY

# Admin email for notifications
wrangler secret put ADMIN_EMAIL

# Admin token for accessing stats
wrangler secret put ADMIN_TOKEN
```

## 📧 Email Service Setup (Resend)

1. Sign up at [resend.com](https://resend.com/)
2. Verify your domain or use their sandbox domain
3. Create an API key
4. Add the API key as a secret: `wrangler secret put EMAIL_API_KEY`

## 🛠️ Development

### Start Development Server

```bash
npm run dev
```

This starts a local development server at `http://localhost:8787`

### Test Endpoints

```bash
# Health check
curl http://localhost:8787/api/health

# Test waitlist (POST)
curl -X POST http://localhost:8787/api/waitlist \
  -H "Content-Type: application/json" \
  -d '{"email":"test@example.com"}'

# Test contact form (POST)
curl -X POST http://localhost:8787/api/contact \
  -H "Content-Type: application/json" \
  -d '{"name":"Test User","email":"test@example.com","subject":"Test","message":"Hello"}'
```

## 🚀 Deployment

### Deploy to Production

```bash
npm run deploy
```

### Deploy to Staging

```bash
npm run deploy:staging
```

### View Logs

```bash
npm run tail
```

## 🔌 Frontend Integration

Update your frontend JavaScript to use the Worker endpoints:

```javascript
// Update waitlist form submission
document
  .getElementById("waitlist-form")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const emailInput = this.querySelector('input[type="email"]');
    const email = emailInput.value.trim();

    try {
      const response = await fetch(
        "https://your-worker-url.workers.dev/api/waitlist",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ email }),
        }
      );

      const result = await response.json();

      if (result.success) {
        showMessage(result.message, "success");
        this.reset();
      } else {
        showMessage(result.error, "error");
      }
    } catch (error) {
      showMessage("Network error. Please try again.", "error");
    }
  });

// Update contact form submission
document
  .querySelector("#contact-form")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const data = Object.fromEntries(formData);

    try {
      const response = await fetch(
        "https://your-worker-url.workers.dev/api/contact",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        }
      );

      const result = await response.json();

      if (result.success) {
        showMessage(result.message, "success");
        this.reset();
      } else {
        showMessage(result.error, "error");
      }
    } catch (error) {
      showMessage("Network error. Please try again.", "error");
    }
  });
```

## 📊 Admin Dashboard

Access waitlist statistics:

```bash
curl -H "Authorization: Bearer YOUR_ADMIN_TOKEN" \
  https://your-worker-url.workers.dev/api/stats
```

## 🔒 Security Features

- **Rate Limiting**: Prevents spam (5 contact forms, 10 waitlist signups per hour per IP)
- **Input Validation**: Sanitizes and validates all inputs
- **CORS Protection**: Configurable CORS headers
- **Email Validation**: Server-side email format validation
- **Duplicate Prevention**: Prevents duplicate waitlist signups

## 🗄️ Data Storage

Data is stored in Cloudflare KV with the following structure:

```
waitlist:{email} -> JSON object with user data
waitlist:count -> Total waitlist count
contact:{timestamp}:{id} -> Contact form submissions
ratelimit:{endpoint}:{ip} -> Rate limiting data (auto-expires)
```

## 🐛 Troubleshooting

### Common Issues

1. **KV Namespace Not Found**

   - Make sure you've created the KV namespace and updated `wrangler.toml`

2. **Email Not Sending**

   - Verify your EMAIL_API_KEY secret is set correctly
   - Check your email service (Resend) dashboard for errors

3. **CORS Errors**

   - Update CORS_ORIGIN in `wrangler.toml` to match your domain

4. **Rate Limiting Too Strict**
   - Adjust the limits in the `checkRateLimit` function in `src/index.js`

### View Logs

```bash
wrangler tail --format=pretty
```

### Debug Mode

Add console.log statements and view them with:

```bash
wrangler tail
```

## 📈 Monitoring

### Built-in Endpoints

- `GET /api/health` - Health check
- `GET /api/stats` - Waitlist statistics (requires admin token)

### Cloudflare Dashboard

Monitor your Worker's performance in the Cloudflare dashboard:

- Request count
- Error rate
- CPU time
- Response time

## 🔄 Updates and Maintenance

### Update the Worker

1. Make changes to `src/index.js`
2. Test locally with `npm run dev`
3. Deploy with `npm run deploy`

### Backup Data

KV data is automatically backed up by Cloudflare, but you can export it:

```bash
wrangler kv:key list --binding=HALO_DB
```

## 🚀 Advanced Features

### Add Database Support

Uncomment the D1 database configuration in `wrangler.toml` for more complex data needs:

```toml
[[d1_databases]]
binding = "DB"
database_name = "halo-ring-db"
database_id = "your_database_id"
```

### Add Analytics

Integrate with Cloudflare Analytics or add custom analytics:

```javascript
// Add to your Worker
const analytics = {
  track: (event, data) => {
    // Send to your analytics service
  },
};
```

## 💰 Costs

Cloudflare Workers pricing:

- **Free Tier**: 100,000 requests/day
- **Paid Plan**: $5/month for 10 million requests

KV storage:

- **Free Tier**: 100,000 read operations/day, 1,000 write operations/day
- **Paid**: $0.50 per million operations

## 📞 Support

- **Cloudflare Workers Docs**: [developers.cloudflare.com/workers](https://developers.cloudflare.com/workers/)
- **Community**: [Discord](https://discord.cloudflare.com/)
- **Support**: [Cloudflare Support](https://support.cloudflare.com/)

---

Your Cloudflare Workers backend is now ready to handle all your Halo Ring website's backend needs! 🎉
