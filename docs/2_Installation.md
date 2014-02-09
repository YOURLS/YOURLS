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

## Upgrade from YOURLS 1.3 or earlier

1.  **Backup the database!**
2.  Make a copy of your `config.php`
3.  Delete all files including `.htaccess` in YOURLS root directory
4.  Unzip the YOURLS archive, upload the files
5.  Copy `config-sample.php` to `config.php` and fill in details. **Don't start with your old config file**, use the new sample config file.
6.  In your new `config.php`, add the _defines_ for `YOURLS_DB_TABLE_URL` and `YOURLS_DB_TABLE_NEXTDEC` you had in your previous config file
7.	Point your browser to `http://yoursite.com/admin/` and follow instructions
8.  After upgrade is well and over, remove the define `YOURLS_DB_TABLE_NEXTDEC` from your config file
