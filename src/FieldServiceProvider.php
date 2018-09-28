<?php

namespace Los\BelongsToBadge;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'belongs-to-badge');

        Nova::serving(function (ServingNova $event) {
            Nova::script('belongs-to-badge', __DIR__ . '/../dist/js/field.js');
            Nova::style('belongs-to-badge', __DIR__ . '/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.make:migration:add-badge-colors', function ($app) {
            return $app['Los\BelongsToBadge\Commands\CreateMigration'];
        });

        $this->commands('command.make:migration:add-badge-colors');
    }

}
