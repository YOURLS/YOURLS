POMO
====

Gettext library to translate with I18n.  
[Why use it](http://codex.wordpress.org/I18n_for_WordPress_Developers).

Usage
-----
```php
<?php
require 'vendor/autoload.php';

use POMO\MO;

// Create MO object
$mo = new MO();

// Import MO file
$mo->import_from_file($the_mo_filepath);
$translations = &$mo;

// Translate
$translations->translate($text)
```
