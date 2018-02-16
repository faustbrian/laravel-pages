# Laravel Pages

[![Build Status](https://img.shields.io/travis/faustbrian/Laravel-Pages/master.svg?style=flat-square)](https://travis-ci.org/faustbrian/Laravel-Pages)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/faustbrian/laravel-pages.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/faustbrian/Laravel-Pages.svg?style=flat-square)](https://github.com/faustbrian/Laravel-Pages/releases)
[![License](https://img.shields.io/packagist/l/faustbrian/Laravel-Pages.svg?style=flat-square)](https://packagist.org/packages/faustbrian/Laravel-Pages)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-pages
```

### Migration

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="BrianFaust\Package\PagesServiceProvider"
```

And then run the migrations to setup the database table.

```bash
$ php artisan migrate
```

## Usage

##### Create a new Page

``` php
Page::create([
    'title' => str_random(10),
    'content' => '# Hello World!',
    'meta' => [
        'title' => str_random(10),
        'description' => str_random(10),
        'author' => str_random(10),
        'keywords' => implode(',' $faker->randomElements()),
    ],
    'status' => Page::STATUS_PUBLISHED,
    'type' => Page::TYPE_MARKDOWN,
]);
```

##### Parse the title, content and meta attributes.

``` php
$page->parse();
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
