# Authorize.net Checkout – Local HTTPS Testing

Accept.js requires the checkout page to be loaded over **HTTPS**. On `http://localhost` you get: *"A HTTPS connection is required."*

## Option A: ngrok (recommended for quick test)

1. Install ngrok: https://ngrok.com/download  
2. Start your site (XAMPP Apache on port 80, or `php artisan serve` on 8000).  
3. In a new terminal run:
   - If using XAMPP (port 80): `ngrok http 80`
   - If using Laravel only: `ngrok http 8000`
4. Copy the **HTTPS** URL ngrok shows (e.g. `https://abc123.ngrok.io`).  
5. Open checkout in the browser using that URL, e.g.:
   - `https://abc123.ngrok.io/never-forget/check-out`
6. Optional: In `.env` set `APP_URL=https://abc123.ngrok.io/never-forget` for that session so redirects and links use the same base URL.

You can then test card payment; Accept.js will work because the page is served over HTTPS.

## Option B: HTTPS on XAMPP (localhost with SSL)

1. In XAMPP, open **Apache (httpd-ssl.conf)** and ensure SSL is enabled and `DocumentRoot` points to your project (e.g. `htdocs`).  
2. Use a self-signed certificate (XAMPP often ships one; or create with OpenSSL).  
3. Restart Apache and open: `https://localhost/never-forget/check-out`  
4. Accept the browser certificate warning (self-signed).  
5. In `.env` set: `APP_URL=https://localhost/never-forget`

After this, you can test Authorize.net checkout on localhost over HTTPS.
