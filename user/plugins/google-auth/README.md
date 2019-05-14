# google-auth-yourls
Enables Google Authentication for YOURLS 

Proper documentation coming soon.

For now, here is the very rough documentation:
1. Download the plugin, move contents to plugins directory and rename to google-auth/
2. Download and configure Google APIs Client Library for PHP
    - See https://github.com/google/google-api-php-client for install instructions.
    - The code assumes that the API directory (vendor/) will reside inside the google-auth/ plugin directory
3. Create an OAuth 2.0 client ID, and download the resulting JSON file (client_secrets.json)
    - See https://developers.google.com/api-client-library/php/auth/web-app
    - place the client secrets file inside the google-auth/ plugin directory
4. This plugin allows you to filter access based on domain (i.e. only @mydomain.com addresses)
    - Edit define('APPROVED_DOMAIN', "mydomain.com");
    - If you want anyone with a Google account to get in (you probably don't want that), set to *
        - i.e. define('APPROVED_DOMAIN', "*");
