<?php

namespace NormanHuth\NovaMenu;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use NormanHuth\NovaBasePackage\ServiceProviderTrait;
use NormanHuth\NovaMenu\Console\Commands\TailwindColorsCommand;

class ToolServiceProvider extends ServiceProvider
{
    use ServiceProviderTrait;

    /**
     * Bootstrap any application services.
     *
     */
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('norman-huth-menu', __DIR__ . '/../dist/js/tool.js');
        });

        $this->addAbout();

        if ($this->app->runningInConsole()) {
            $this->commands([
                TailwindColorsCommand::class,
            ]);
        }
    }
}
