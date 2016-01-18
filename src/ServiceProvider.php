<?php

namespace DraperStudio\Pages;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'pages';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}
