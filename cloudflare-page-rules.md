# Cloudflare Page Rules Configuration

## Page Rule 1: Cache Everything for Static Assets

- **URL Pattern**: `*yourdomain.com/img/*`
- **Settings**:
  - Cache Level: Cache Everything
  - Edge Cache TTL: 1 month
  - Browser Cache TTL: 1 month

## Page Rule 2: Enable Auto Minify

- **URL Pattern**: `*yourdomain.com/*`
- **Settings**:
  - Auto Minify: Check HTML, CSS, and JavaScript

## Page Rule 3: Always Use HTTPS

- **URL Pattern**: `http://*yourdomain.com/*`
- **Settings**:
  - Always Use HTTPS: On

## Additional Cloudflare Optimizations to Enable

1. **Brotli Compression**

   - Go to Cloudflare Dashboard > Speed > Optimization > Content Optimization
   - Enable "Brotli" compression

2. **HTTP/2 and HTTP/3**

   - Go to Cloudflare Dashboard > Network
   - Enable HTTP/2 and HTTP/3 (QUIC)

3. **Rocket Loader**

   - Go to Cloudflare Dashboard > Speed > Optimization > Content Optimization
   - Enable "Rocket Loader"

4. **Image Optimization**

   - Go to Cloudflare Dashboard > Speed > Optimization > Content Optimization
   - Enable "Image Optimization" if available on your plan

5. **Mobile Optimization**

   - Go to Cloudflare Dashboard > Speed > Optimization > Content Optimization
   - Enable "Mobile Redirect" and "Accelerated Mobile Links" if applicable

6. **Preload Key Resources**

   - Already implemented in the HTML code using preload directives for critical CSS and JS

7. **Email Obfuscation**
   - Go to Cloudflare Dashboard > Scrape Shield
   - Enable "Email Obfuscation" to protect email addresses from scrapers
