<?php

namespace App\Providers;

use App\Todo\Manager\TodoManager;
use App\Todo\Manager\TodoManagerInterface;
use App\Todo\Services\Create;
use App\Todo\Services\Delete;
use App\Todo\Services\Update;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TodoManagerInterface::class, function ($app, $params) {
            return new TodoManager($params[0] ?? null);
        });

        $this->app->bind(Create::class, function ($app, $params) {
            return new Create($this->app->make(TodoManagerInterface::class, $params));
        });

        $this->app->bind(Update::class, function ($app, $params) {
            return new Update($this->app->make(TodoManagerInterface::class, $params));
        });

        $this->app->bind(Delete::class, function ($app, $params) {
            return new Delete($this->app->make(TodoManagerInterface::class, $params));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
