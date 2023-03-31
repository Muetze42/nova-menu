<?php

namespace NormanHuth\NovaMenu;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('norman-huth-menu', __DIR__.'/../dist/js/tool.js');
            Nova::style('norman-huth-menu', __DIR__.'/../dist/css/tool.css');
        });
    }
}
