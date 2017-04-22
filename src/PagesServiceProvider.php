<?php



declare(strict_types=1);



namespace BrianFaust\Pages;

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class PagesServiceProvider extends AbstractServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishMigrations();
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'pages';
    }
}
