<?php

namespace NormanHuth\NovaMenu\Services;

use Inertia\Inertia;
use JetBrains\PhpStorm\ExpectedValues;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class MenuFilter
{
    public function __construct(
        #[ExpectedValues(values: ['top', 'bottom', 'both'])]
        string $postion
    ) {
        Nova::serving(function (ServingNova $event) use ($postion) {
            Nova::provideToScript([
                'menuAdvPosition' => strtolower($postion),
            ]);
        });
        //Inertia::share('menuAdvPosition', strtolower($postion));
    }

    /**
     * Activate main menu filter.
     */
    public static function activate(
        #[ExpectedValues(values: ['top', 'bottom', 'both'])]
        string $postion
    ): static {
        return new static($postion);
    }

    /**
     * Set menu filter input placeholder.
     */
    public function placeholder(string $placeholder): static
    {
        Inertia::share('menuAdvPlaceholder', $placeholder);

        return $this;
    }

    /**
     * Set menu filter empty text.
     */
    public function emptyText(string $text): static
    {
        Inertia::share('menuAdvEmptyText', $text);

        return $this;
    }
}
