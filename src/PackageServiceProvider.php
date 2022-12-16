<?php

namespace NormanHuth\NovaMenu;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('norman-huth-menu', __DIR__.'/../dist/js/tool.js');
            Nova::style('nova-prism-js', __DIR__.'/../dist/css/tool.css');
        });
    }
}
