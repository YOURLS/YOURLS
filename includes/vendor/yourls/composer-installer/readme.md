
# YOURLS Composer Installer

[![Build Status](https://travis-ci.com/YOURLS/composer-installer.svg?branch=master)](https://travis-ci.com/YOURLS/composer-installer)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/YOURLS/composer-installer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/YOURLS/composer-installer/?branch=master)
<!-- [![Packagist](https://img.shields.io/packagist/v/yourls/composer-installer.svg)](https://packagist.org/packages/yourls/composer-installerurls) -->

> A custom [Composer installer](https://getcomposer.org/doc/articles/custom-installers.md) for **YOURLS Plugins**

> In a nutshell: `composer require joecool/super-yourls-plugin`

#### Foreword: install YOURLS with Composer

For your information, installing YOURLS with Composer is already possible out of the box and doesn't need anything special. Just do :

 ```bash
$> composer create-project yourls/yourls path/to/install
 ```

 (For instance `composer create-project yourls/yourls .` in an empty directory)

Note that this merely *downloads* the [latest YOURLS release](https://github.com/YOURLS/YOURLS/releases) in the specified directory. You will need after this to properly *install* YOURLS (see [yourls.org/#Install](https://yourls.org/#Install))

## Install plugins



As a user you simply need to `require` the plugin in your `composer.json`.

```js
{
    ...
    "require": {
        ...
        "joecool/super-plugin": "^1.0"
    }
    ...
}
```
Even easier, in the commande line, just type:

 ```bash
$> composer require joecool/superplugin
 ```

This will download the plugin into  `user/plugins/superplugin` , and transparently install any dependency in YOURLS' `vendor` directory.

This specific YOURLS plugin itself needs to be listed on [Packagist](https://packagist.org/). If it's not the case, nag your favorite plugin coder so they get it listed or, *even better*, open a simple Pull Request on their repository to help them doing so.

## Make YOURLS plugins compatible

As a plugin coder, this is a simple 2 steps operation: add a `composer.json` and get your plugin listed on [Packagist](https://packagist.org/)

#### Add a `composer.json` to your plugin

First, your plugin must require PHP 7.2+

The `composer.json` tells everything Composer needs to know about your plugin. The important bits are `"type": "yourls-plugin"` and `"require"` this installer `"yourls/composer-installer"` as a dependency

A minimalist `composer.json` would be for example:

```js
{
    "name": "ozh/yourls-composer-plugin",
    "description": "Example of a YOURLS plugin installable with Composer",
    "type": "yourls-plugin", // <-- THIS
    "license":"WTFPL",
    "require": {
        "php": ">=7.2",
        "yourls/composer-installer": "^1.0" // <-- AND THIS
    }
}
```

Of course, your plugin can completely leverage all Composer features and use any package: simply list them as additional dependencies:

```js
{
    "name": "joecool/awesome-plugin",
    "description": "This plugin does this and that",
    "type": "yourls-plugin",
    "license":"MIT",
    "require": {
        "php": ">=7.2",
        "yourls/composer-installer": "^1.0",
        "google/auth": "^2.3",
        "twilio/sdk": "^2.0",
        "
    }
}
```

In such case, additional dependencies for your plugin will be placed in YOURLS' `includes/vendor` 

#### Get listed on Packagist

This step is pretty straightforward, head to https://packagist.org/packages/submit and follow instructions. If you are completely new to Composer, their [about page](https://packagist.org/about) is a recommended read.

## Benefits

Making YOURLS plugins compatible with this Composer custom installer is easy and optimizes resources.

* If several plugins use the same libraries, say `endroid/qr-code`, this library will be installed once in YOURLS and available to all plugins.
* It makes it simple for site managers to quickly scaffold YOURLS sites:  install everything with a simple one-liner: `composer create-project yourls/yourls; composer require ozh/stuff slayer/pentagram` 
* It makes it easier for plugin coders and plugin users to update plugins

## Future plans

If this project seems to gain traction, we would include it in YOURLS' core. Eventually this would mean even easier YOURLS plugin integration (just have a `composer.json` file with `"type":"yourls-plugin"`) and support for user defined `composer.json` files in the `user/` directory.

If you want this to happen, express your interest, update your plugins, tell the little YOURLS world about it :-*)*

## Credits

Much of this custom installer code comes from project [Kirby](https://github.com/getkirby/composer-installer) . Thanks a bunch to them.

## License

MIT. Do whatever the hell you want with this.
