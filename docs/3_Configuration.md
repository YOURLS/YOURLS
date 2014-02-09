How to configure _YOURLS_ in `user/config.php`.

### MySQL settings

*   `YOURLS_DB_USER` &mdash; **Your MySQL username**  
```php
define( 'YOURLS_DB_USER', 'joe' );
```

*   `YOURLS_DB_PASS` &mdash; **Your MySQL password**  
```php
define( 'YOURLS_DB_PASS', 'MySeCreTPaSsW0rd' );
```

*   `YOURLS_DB_NAME` &mdash; **The database name**  
```php
define( 'YOURLS_DB_NAME', 'yourls' );
```

*   `YOURLS_DB_HOST` &mdash; **The database host**  
```php
define( 'YOURLS_DB_HOST', 'localhost' );
```

*   `YOURLS_DB_PREFIX` &mdash; **The name prefix for all the tables YOURLS will need**  
```php
define( 'YOURLS_DB_PREFIX', 'yourls_' );
```


### Site options

*   `YOURLS_SITE` &mdash; **Your (short) domain URL, no trailing slash, lowercase**  
    If you pick the non-www version of your domain, don't use the www version in your browser (and vice-versa).  
```php
define( 'YOURLS_SITE', 'http://ozh.in' );
```

*   `YOURLS_HOURS_OFFSET` &mdash; **Timezone GMT offset**  
```php
define( 'YOURLS_HOURS_OFFSET', '-5' );
```

*   `YOURLS_PRIVATE` &mdash; **Private means the admin area will be protected with login/pass as defined below**  
    See [Private or Public](http://yourls.org/privatepublic) for more.  
```php
define( 'YOURLS_PRIVATE', 'true' );
```

*   `YOURLS_UNIQUE_URLS` &mdash; **Allow multiple short URLs for a same long URL**  
    Set to `true` to allow only one pair of shortURL/longURL (default YOURLS behavior), or to `false` to allow creation of multiple short URLs pointing to the same long URL (as bit.ly does).  
```php
define( 'YOURLS_UNIQUE_URLS', 'true' );
```

*   `YOURLS_COOKIEKEY` &mdash; **A random secret hash used to encrypt cookies**  
    You don't have to remember it, make it long and complicated. Hint: generate a unique one at [http://yourls.org/cookie](http://yourls.org/cookie)  
```php
define( 'YOURLS_COOKIEKEY', 'qQ4KhL_pu|s@Zm7n#%:b^{A[vhm' );
```

*   `yourls_user_passwords` &mdash; **A list of username(s) and password(s) allowed to access the site if private**  
    Passwords can either be in plain text, or encrypted: see [http://yourls.org/userpassword](http://yourls.org/userpassword) for more information.  
```php
$yourls_user_passwords = array(
    'joe' => 'mypassword',
    );
```


### URL Shortening settings

*   `YOURLS_URL_CONVERT` &mdash; **URL shortening method: base `36` or `62`**  
    See [FAQ](#faq) for more explanations.
```php
define( 'YOURLS_URL_CONVERT', '36' );
```

*   `yourls_reserved_URL` &mdash; **A list of reserved keywords that won't be used as short URLs**  
    Define here negative, unwanted or potentially misleading keywords.  
```php
yourls_reserved_URL = array( 'porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay' );
```


### Optional settings

*   `YOURLS_PRIVATE_INFOS`  
    If `YOURLS_PRIVATE` is set to `true`, you can still make stat pages public.   
```php
define( 'YOURLS_PRIVATE_INFOS', false );
```

*   `YOURLS_PRIVATE_API`  
    If `YOURLS_PRIVATE` is set to `true`, you can still make your API public.  
```php
define( 'YOURLS_PRIVATE_API', false );
```

*	`YOURLS_NOSTATS`  
    If `YOURLS_NOSTATS` is set to `true`, redirects won't be logged and there will be not stats available.
```php
define( 'YOURLS_NOSTATS', false );
```

### Advanced settings

File `includes/load-yourls.php` contains a few more undocumented but self explanatory and commented settings. Add them to your own `config.php` if you know what you're doing.
