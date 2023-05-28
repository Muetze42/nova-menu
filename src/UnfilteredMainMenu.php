<?php

namespace NormanHuth\NovaMenu;

use Closure;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;

class UnfilteredMainMenu
{
    /**
     * The callback used to create Nova's unfiltered main menu over the menu filter.
     *
     * @var (Closure(Request, Menu):(Menu|array))|null
     */
    public static ?Closure $unfilteredMainMenuOverCallback;

    /**
     * The callback used to create Nova's unfiltered main menu under the menu filter.
     *
     * @var (Closure(Request, Menu):(Menu|array))|null
     */
    public static ?Closure $unfilteredMainMenuUnderCallback;

    /**
     * Set the main menu for Nova over the menu filter.
     *
     * @param Closure(Request, Menu):(Menu|array) $callback
     * @return void
     */
    public static function over(Closure $callback): void
    {
        static::$unfilteredMainMenuOverCallback = $callback;

        Nova::serving(function (ServingNova $event) {
            Nova::provideToScript([
                'unfilteredMainMenuOver' => Menu::wrap(call_user_func(static::$unfilteredMainMenuOverCallback, app(Request::class))),
            ]);
        });
    }

    /**
     * Set the main menu for Nova under the menu filter.
     *
     * @param Closure(Request, Menu):(Menu|array) $callback
     * @return void
     */
    public static function under(Closure $callback): void
    {
        static::$unfilteredMainMenuUnderCallback = $callback;

        Nova::serving(function (ServingNova $event) {
            Nova::provideToScript([
                'unfilteredMainMenuUnder' => Menu::wrap(call_user_func(static::$unfilteredMainMenuUnderCallback, app(Request::class))),
            ]);
        });
    }
}
