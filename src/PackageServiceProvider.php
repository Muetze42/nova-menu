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
            Nova::script('menu-section-fa', __DIR__.'/../dist/js/tool.js');
        });
    }
}
