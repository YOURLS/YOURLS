![Bookmarklet Gen Logo](https://private-user-images.githubusercontent.com/223647/511368974-902e538e-0a33-4214-8c13-4b320bc473fe.png?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3NjI1MzIxNTgsIm5iZiI6MTc2MjUzMTg1OCwicGF0aCI6Ii8yMjM2NDcvNTExMzY4OTc0LTkwMmU1MzhlLTBhMzMtNDIxNC04YzEzLTRiMzIwYmM0NzNmZS5wbmc_WC1BbXotQWxnb3JpdGhtPUFXUzQtSE1BQy1TSEEyNTYmWC1BbXotQ3JlZGVudGlhbD1BS0lBVkNPRFlMU0E1M1BRSzRaQSUyRjIwMjUxMTA3JTJGdXMtZWFzdC0xJTJGczMlMkZhd3M0X3JlcXVlc3QmWC1BbXotRGF0ZT0yMDI1MTEwN1QxNjEwNThaJlgtQW16LUV4cGlyZXM9MzAwJlgtQW16LVNpZ25hdHVyZT02YWVmZGYwNDg3MmFkYmQ0OGJiYThlYTk3OWUxMDRiY2VhODY1MzAyYmEzNjcxMjdmNzMyNGE3MDViOGMwMjg5JlgtQW16LVNpZ25lZEhlYWRlcnM9aG9zdCJ9.dbNtvWtjo3n7pqXjudl7oK8wMsWOugelOTdmziFNezM)

# Bookmarklet Gen 

> Convert (readable) Javascript code into bookmarklet links

## Features

- removes comments
- compresses code by removing extraneous spaces, but not within literal strings.
  Example:
    ```javascript
  function   someName(   param   ) {
     alert( "this is a string" )
  }
    ```
  will return:
    ```js
  function%20someName(param){alert("this%20is%20a%20string")}
    ```
- encodes what needs to be encoded
- wraps code into a self-invoking function ready for bookmarking

This is basically a slightly enhanced PHP port of the excellent Bookmarklet Crunchinator: 
http://ted.mielczarek.org/code/mozilla/bookmarklet.html

## Installation

If you are using Composer, add this requirement to your `composer.json` file and run `composer install`:

```json
    {
        "require": {
            "ozh/bookmarkletgen": "~1.3"
        }
    }
```

Or simply in the command line : `composer install ozh/bookmarkletgen`

If you're not using composer, download the class file and include it manually.

## Example

```php
<?php
$javascript = <<<CODE
var link="https://google.com/"; // destination
window.location = link;
CODE;

require 'vendor/autoload.php'; // if you install using Composer
require 'path/to/Bookmarkletgen.php'; // otherwise

$book = new \Ozh\Bookmarkletgen\Bookmarkletgen;
$link = $book->crunch( $javascript );

printf( '<a href="%s">bookmarklet</a>', $link );
```

will print:

```html
<a href="javascript:(function()%7Bvar%20link%3D%22https%3A%2F%2Fgoogle.com%2F%22%3Bwindow.location%3Dlink%3B%7D)()%3B">bookmarklet</a>
```

See provided examples for more details.

## Tests

This library comes with unit tests to make sure the resulting crunched Javascript is valid code.

The current version supports PHP 8.1+ ([previous releases](https://github.com/ozh/bookmarkletgen/releases) were tested with PHP 5.3 – 7.2).

## License

Do whatever the hell you want to do with it.
