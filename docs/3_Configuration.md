Configuration (in `user/config.php`).

## MySQL settings

*   `YOURLS_DB_USER` &mdash; **Your MySQL username**  
	_Example:_ `'joe'`
*   `YOURLS_DB_PASS` &mdash; **Your MySQL password**  
	_Example:_ `'MySeCreTPaSsW0rd'`
*   `YOURLS_DB_NAME` &mdash; **The database name**  
	_Example:_ `'yourls'`
*   `YOURLS_DB_HOST` &mdash; **The database host**  
	_Example:_ `'localhost'`
*   `YOURLS_DB_PREFIX` &mdash; **The name prefix for all the tables YOURLS will need**  
	_Example:_ `'yourls_'`

## Site options

*   `YOURLS_SITE` &mdash; **Your (short) domain URL, no trailing slash, lowercase**  
	If you pick the non-www version of your domain, don't use the www version in your browser (and vice-versa).  
	_Example:_ `'http://ozh.in'`
*   `YOURLS_HOURS_OFFSET` &mdash; **Timezone GMT offset**  
	_Example:_ `'-5'`
*   `YOURLS_PRIVATE` &mdash; **Private means the admin area will be protected with login/pass as defined below**  
	See [Private or Public](http://yourls.org/privatepublic) for more.  
	_Example:_ `'true'`
*   `YOURLS_UNIQUE_URLS` &mdash; **Allow multiple short URLs for a same long URL**  
	Set to `true` to allow only one pair of shortURL/longURL (default YOURLS behavior), or to `false` to allow creation of multiple short URLs pointing to the same long URL (as bit.ly does).  
	_Example:_ `'true'`
*   `YOURLS_COOKIEKEY` &mdash; **A random secret hash used to encrypt cookies**  
	You don't have to remember it, make it long and complicated. Hint: generate a unique one at [http://yourls.org/cookie](http://yourls.org/cookie)  
	_Example:_ `'qQ4KhL_pu|s@Zm7n#%:b^{A[vhm'`
*   `yourls_user_passwords` &mdash; **A list of username(s) and password(s) allowed to access the site if private**  
	Passwords can either be in plain text, or encrypted: see [http://yourls.org/userpassword](http://yourls.org/userpassword) for more information.  
	_Example:_ `'joe' => 'mypassword'`

## URL Shortening settings

*   `YOURLS_URL_CONVERT` &mdash; **URL shortening method: base `36` or `62`**  
	See [FAQ](#faq) for more explanations.
*   `yourls_reserved_URL` &mdash; **A list of reserved keywords that won't be used as short URLs**  
	Define here negative, unwanted or potentially misleading keywords.  
	_Example:_ `'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay'`

## Optional settings

*   `YOURLS_PRIVATE_INFOS`  
	If `YOURLS_PRIVATE` is set to `true`, you can still make stat pages public.   
	_Example:_ `define('YOURLS_PRIVATE_INFOS', false);`
*   `YOURLS_PRIVATE_API`  
	If `YOURLS_PRIVATE` is set to `true`, you can still make your API public.  
	_Example:_ `define('YOURLS_PRIVATE_API', false);`
*	`YOURLS_NOSTATS`  
	If `YOURLS_NOSTATS` is set to `true`, redirects won't be logged and there will be not stats available.

## Advanced settings

File `includes/load-yourls.php` contains a few more undocumented but self explanatory and commented settings. Add them to your own `config.php` if you know what you're doing.
