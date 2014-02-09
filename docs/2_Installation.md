## Fresh Install

1.  Unzip the YOURLS archive
2.  Copy `user/config-sample.php` to `user/config.php`
3.  Open `user/config.php` with a raw text editor (like Notepad) and fill in the required settings
4.  Upload the unzipped files to your domain `public_html` or `www` folder
5.  Create a new database (see [Configuration](#config) &ndash; you can also use an existing one)
6.  Point your browser to `http://yoursite.com/admin/`

## Upgrade

1.  **Backup the database!**
2.  Unzip the YOURLS archive
3.  Upload files to your server, overwriting your existing install
4.  Point your browser to `http://yoursite.com/admin/`
5.  Tip: you can now move your `config.php` file to the `/user` directory
