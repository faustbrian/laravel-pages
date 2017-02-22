# Laravel Pages

I would appreciate you taking the time to look at my [Patreon](https://www.patreon.com/faustbrian) and considering to support me if I'm saving you some time with my work.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-pages
```

Add the service provider to `config/app.php` in the `providers` array.

``` php
BrianFaust\Pages\PagesServiceProvider::class
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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
