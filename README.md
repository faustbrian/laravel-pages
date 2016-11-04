# Laravel Pages

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-pages
```

Add the service provider to `config/app.php` in the `providers` array.

``` php
'providers' => [
    // ... Illuminate Providers
    // ... App Providers
    BrianFaust\Pages\ServiceProvider::class
];
```

### Migration

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="BrianFaust\Package\ServiceProvider"
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

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

The [The MIT License (MIT)](LICENSE). Please check the [LICENSE](LICENSE) file for more details.
