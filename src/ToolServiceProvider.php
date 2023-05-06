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
        });

        if ($this->app->runningInConsole()) {
            $this->commands($this->getCommands());
        }
    }

    /**
     * Get all package commands
     *
     * @return array
     */
    protected function getCommands(): array
    {
        return array_filter(array_map(function ($item) {
            return '\\'.__NAMESPACE__.'\\Console\\Commands\\'.pathinfo($item, PATHINFO_FILENAME);
        }, glob(__DIR__.'/Console/Commands/*.php')), function ($item) {
            return class_basename($item) != 'Command';
        });
    }
}
