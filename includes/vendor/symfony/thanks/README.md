<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://symfony.com/logos/symfony_black_02.svg">
</a></p>

Give thanks (in the form of a [GitHub ★ ](https://help.github.com/articles/about-stars/)) to your fellow PHP package maintainers (not limited to Symfony components)!

Install
-------

Install this as any other (dev) Composer package:
```sh
$ composer require --dev symfony/thanks
```

You can also install it once for all your local projects:
```sh
$ composer global require symfony/thanks
```

Usage
-----

```sh
$ composer thanks
```

This will find all of your Composer dependencies, find their github.com repository, and star their GitHub repositories. This was inspired by `cargo thanks`, which was inspired in part by Medium's clapping button as a way to show thanks for someone else's work you've found enjoyment in.

If you're wondering why did some dependencies get thanked and not others, the answer is that this plugin only supports github.com at the moment. Pull requests are welcome to add support for thanking packages hosted on other services.

Original idea by Doug Tangren (softprops) 2017 for Rust (thanks!)

Implemented by Nicolas Grekas (SensioLabs & Blackfire.io) 2017 for PHP.

Forwarding stars
----------------

Package authors can *send* a star to another package that they would like to thank.

If you are a package author and want to thank another repository, you can add a `thanks` entry in the `extra` section of your `composer.json` file.

For example, `symfony/webpack-encore-pack` sends a star to `symfony/webpack-encore`:

```json
{
    "extra": {
        "thanks": {
            "name": "symfony/webpack-encore",
            "url": "https://github.com/symfony/webpack-encore"
        }
    }
}
```
