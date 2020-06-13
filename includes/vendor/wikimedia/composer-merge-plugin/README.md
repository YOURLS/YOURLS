[![Latest Stable Version]](https://packagist.org/packages/wikimedia/composer-merge-plugin) [![License]](https://github.com/wikimedia/composer-merge-plugin/blob/master/LICENSE)
[![Build Status]](https://travis-ci.org/wikimedia/composer-merge-plugin)
[![Code Coverage]](https://scrutinizer-ci.com/g/wikimedia/composer-merge-plugin/?branch=master)

Composer Merge Plugin
=====================

Merge multiple composer.json files at [Composer] runtime.

Composer Merge Plugin is intended to allow easier dependency management for
applications which ship a composer.json file and expect some deployments to
install additional Composer managed libraries. It does this by allowing the
application's top level `composer.json` file to provide a list of optional
additional configuration files. When Composer is run it will parse these files
and merge their configuration settings into the base configuration. This
combined configuration will then be used when downloading additional libraries
and generating the autoloader.

Composer Merge Plugin was created to help with installation of [MediaWiki]
which has core library requirements as well as optional libraries and
extensions which may be managed via Composer.


Installation
------------

Composer Merge Plugin requires [Composer 1.0.0](https://getcomposer.org/) or
newer.

```
$ composer require wikimedia/composer-merge-plugin
```


Usage
-----

```json
{
    "require": {
        "wikimedia/composer-merge-plugin": "dev-master"
    },
    "extra": {
        "merge-plugin": {
            "include": [
                "composer.local.json",
                "extensions/*/composer.json"
            ],
            "require": [
                "submodule/composer.json"
            ],
            "recurse": true,
            "replace": false,
            "ignore-duplicates": false,
            "merge-dev": true,
            "merge-extra": false,
            "merge-extra-deep": false,
            "merge-scripts": false
        }
    }
}
```


Plugin configuration
--------------------

The plugin reads its configuration from the `merge-plugin` section of your
composer.json's `extra` section. An `include` setting is required to tell
Composer Merge Plugin which file(s) to merge.


### include

The `include` setting can specify either a single value or an array of values.
Each value is treated as a PHP `glob()` pattern identifying additional
composer.json style configuration files to merge into the root package
configuration for the current Composer execution.

The following sections of the found configuration files will be merged into
the Composer root package configuration as though they were directly included
in the top-level composer.json file:

* [autoload](https://getcomposer.org/doc/04-schema.md#autoload)
* [autoload-dev](https://getcomposer.org/doc/04-schema.md#autoload-dev)
  (optional, see [merge-dev](#merge-dev) below)
* [conflict](https://getcomposer.org/doc/04-schema.md#conflict)
* [provide](https://getcomposer.org/doc/04-schema.md#provide)
* [replace](https://getcomposer.org/doc/04-schema.md#replace)
* [repositories](https://getcomposer.org/doc/04-schema.md#repositories)
* [require](https://getcomposer.org/doc/04-schema.md#require)
* [require-dev](https://getcomposer.org/doc/04-schema.md#require-dev)
  (optional, see [merge-dev](#merge-dev) below)
* [suggest](https://getcomposer.org/doc/04-schema.md#suggest)
* [extra](https://getcomposer.org/doc/04-schema.md#extra)
  (optional, see [merge-extra](#merge-extra) below)
* [scripts](https://getcomposer.org/doc/04-schema.md#scripts)
  (optional, see [merge-scripts](#merge-scripts) below)


### require

The `require` setting is identical to [`include`](#include) except when
a pattern fails to match at least one file then it will cause an error.

### recurse

By default the merge plugin is recursive; if an included file has
a `merge-plugin` section it will also be processed. This functionality can be
disabled by adding a `"recurse": false` setting.


### replace

By default, Composer's conflict resolution engine is used to determine which
version of a package should be installed when multiple files specify the same
package. A `"replace": true` setting can be provided to change to a "last
version specified wins" conflict resolution strategy. In this mode, duplicate
package declarations found in merged files will overwrite the declarations
made by earlier files. Files are loaded in the order specified by the
`include` setting with globbed files being processed in alphabetical order.

### ignore-duplicates

By default, Composer's conflict resolution engine is used to determine which
version of a package should be installed when multiple files specify the same
package. An `"ignore-duplicates": true` setting can be provided to change to
a "first version specified wins" conflict resolution strategy. In this mode,
duplicate package declarations found in merged files will be ignored in favor
of the declarations made by earlier files. Files are loaded in the order
specified by the `include` setting with globbed files being processed in
alphabetical order.

Note: `"replace": true` and `"ignore-duplicates": true` modes are mutually
exclusive. If both are set, `"ignore-duplicates": true` will be used.

### merge-dev

By default, `autoload-dev` and `require-dev` sections of included files are
merged. A `"merge-dev": false` setting will disable this behavior.


### merge-extra

A `"merge-extra": true` setting enables the merging the contents of the
`extra` section of included files as well. The normal merge mode for the extra
section is to accept the first version of any key found (e.g. a key in the
master config wins over the version found in any imported config). If
`replace` mode is active ([see above](#replace)) then this behavior changes
and the last key found will win (e.g. the key in the master config is replaced
by the key in the imported config). If `"merge-extra-deep": true` is specified
then, the sections are merged similar to array_merge_recursive() - however
duplicate string array keys are replaced instead of merged, while numeric
array keys are merged as usual. The usefulness of merging the extra section
will vary depending on the Composer plugins being used and the order in which
they are processed by Composer.

Note that `merge-plugin` sections are excluded from the merge process, but are
always processed by the plugin unless [recursion](#recurse) is disabled.

### merge-scripts

A `"merge-scripts": true` setting enables merging the contents of the
`scripts` section of included files as well. The normal merge mode for the
scripts section is to accept the first version of any key found (e.g. a key in
the master config wins over the version found in any imported config). If
`replace` mode is active ([see above](#replace)) then this behavior changes
and the last key found will win (e.g. the key in the master config is replaced
by the key in the imported config).

Note: [custom commands][] added by merged configuration will work when invoked
as `composer run-script my-cool-command` but will not be available using the
normal `composer my-cool-command` shortcut.


Running tests
-------------

```
$ composer install
$ composer test
```


Contributing
------------

Bug, feature requests and other issues should be reported to the [GitHub
project]. We accept code and documentation contributions via Pull Requests on
GitHub as well.

- [PSR-2 Coding Standard][] is used by the project. The included test
  configuration uses [PHP Code Sniffer][] to validate the conventions.
- Tests are encouraged. Our test coverage isn't perfect but we'd like it to
  get better rather than worse, so please try to include tests with your
  changes.
- Keep the documentation up to date. Make sure `README.md` and other
  relevant documentation is kept up to date with your changes.
- One pull request per feature. Try to keep your changes focused on solving
  a single problem. This will make it easier for us to review the change and
  easier for you to make sure you have updated the necessary tests and
  documentation.


License
-------

Composer Merge plugin is licensed under the MIT license. See the
[`LICENSE`](LICENSE) file for more details.


---
[Composer]: https://getcomposer.org/
[MediaWiki]: https://www.mediawiki.org/wiki/MediaWiki
[GitHub project]: https://github.com/wikimedia/composer-merge-plugin
[PSR-2 Coding Standard]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PHP Code Sniffer]: http://pear.php.net/package/PHP_CodeSniffer
[Latest Stable Version]: https://img.shields.io/packagist/v/wikimedia/composer-merge-plugin.svg?style=flat
[License]: https://img.shields.io/packagist/l/wikimedia/composer-merge-plugin.svg?style=flat
[Build Status]: https://img.shields.io/travis/wikimedia/composer-merge-plugin.svg?style=flat
[Code Coverage]: https://img.shields.io/scrutinizer/coverage/g/wikimedia/composer-merge-plugin/master.svg?style=flat
[custom commands]: https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands
