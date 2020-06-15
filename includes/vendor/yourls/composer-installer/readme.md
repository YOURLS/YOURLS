


# YOURLS Composer Installer 
<p align="center"><img src="https://user-images.githubusercontent.com/223647/84647720-18dba800-af04-11ea-9e7f-c6d623050f4a.png"/></p>

> Keep track of plugins and custom packages added with Composer in a `user/composer.json` file that is left untouched when you update YOURLS.

> In a nutshell: `composer add-plugin joecool/super-yourls-plugin`

#### :construction: &nbsp; Work in progress. This will be included with the next version of YOURLS.

[![Build Status](https://travis-ci.com/YOURLS/composer-installer.svg?branch=master)](https://travis-ci.com/YOURLS/composer-installer) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/YOURLS/composer-installer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/YOURLS/composer-installer/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/YOURLS/composer-installer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/YOURLS/composer-installer/?branch=master) [![Packagist](https://img.shields.io/packagist/v/yourls/composer-installer.svg)](https://packagist.org/packages/yourls/composer-installer)


#### Foreword : install YOURLS with Composer

Installing YOURLS with Composer is already possible out of the box and doesn't need anything special. Just do :

 ```bash
$> composer create-project yourls/yourls path/to/install
 ```

 (For instance `composer create-project yourls/yourls .` in an empty directory)

Note that this merely *downloads* the [latest YOURLS release](https://github.com/YOURLS/YOURLS/releases) in the specified directory. You will need after this to properly *install* YOURLS (see [yourls.org/#Install](https://yourls.org/#Install))

## Install plugins

As a user you simply need to `require` the plugin in your `user/composer.json`.

```js
{
    "require": {
        "joecool/super-plugin": "^1.0"
    }
}
```
Even easier, in the command line, just type:

 ```bash
$> composer add-plugin joecool/superplugin
 ```

This will download the plugin into  `user/plugins/superplugin` , and transparently install any dependency in YOURLS' `vendor` directory.

This specific YOURLS plugin itself needs to be listed on [Packagist](https://packagist.org/). If it's not the case, nag your favorite plugin coder so they get it listed. *Even better*, open a simple Pull Request on their repository to help them doing so: see below.

##### :bulb: Try it yourself:
```
$> composer add-plugin ozh/example-plugin
```

## Make YOURLS plugins compatible

As a plugin coder, this is a simple 2 steps operation: add a `composer.json` and get your plugin listed on [Packagist](https://packagist.org/). That's it.

### 1. Add a `composer.json` to your plugin

First, your plugin must require PHP 7.2+

The `composer.json` tells everything Composer needs to know about your plugin. The important bits are `"type": "yourls-plugin"` and `"require"` this installer `"yourls/composer-installer"` as a dependency

A minimalist `composer.json` would be for example:

```js
{
    "name": "ozh/example-plugin",
    "description": "Example of a YOURLS plugin installable with Composer",
    "type": "yourls-plugin", // <-- THIS
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

##### :bulb: Simple example:
See https://github.com/ozh/example-plugin/

### 2. Get listed on Packagist

This step is pretty straightforward, head to https://packagist.org/packages/submit and follow instructions.

If you are completely new to Composer, their [about page](https://packagist.org/about) is a recommended read.

## Benefits

Making YOURLS plugins compatible with this Composer custom installer is easy and optimizes resources.

* If several plugins use the same libraries, say `endroid/qr-code`, this library will be installed once in YOURLS and available to all plugins.
* It makes it simple for site managers to quickly scaffold YOURLS sites:  install everything with a simple one-liner: `composer create-project yourls/yourls; composer require ozh/stuff slayer/pentagram` 
* It makes it easier for plugin coders and plugin users to update plugins

## Credits

Much of this custom installer code comes from project [Kirby](https://github.com/getkirby/composer-installer) . Thanks a bunch to them.

## License

MIT. Do whatever the hell you want with this.

