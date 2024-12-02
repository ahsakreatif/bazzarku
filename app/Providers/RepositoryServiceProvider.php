<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Prettus\Repository\Providers\RepositoryServiceProvider as PrettusRepositoryServiceProvider;

class RepositoryServiceProvider extends PrettusRepositoryServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        parent::register();
        $this->app->bind(
            \App\Repositories\SiteConfigRepository::class,
            \App\Repositories\SiteConfigRepositoryEloquent::class,
        );
        $this->app->bind(
            \App\Repositories\EventRepository::class,
            \App\Repositories\EventRepositoryEloquent::class,
        );
        $this->app->bind(
            \App\Repositories\EventTypeRepository::class,
            \App\Repositories\EventTypeRepositoryEloquent::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        parent::boot();
    }
}
