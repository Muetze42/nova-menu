<?php

namespace NormanHuth\NovaMenu\Services;

use Inertia\Inertia;
use JetBrains\PhpStorm\ExpectedValues;

class MenuFilter
{
    public function __construct(
        #[ExpectedValues(values: ['top', 'bottom', 'both'])]
        string $postion
    ) {
        Inertia::share('menuAdvPosition', strtolower($postion));
    }

    /**
     * Activate main menu filter.
     *
     * @param string $postion
     *
     * @return \NormanHuth\NovaMenu\Services\MenuFilter
     */
    public static function activate(
        #[ExpectedValues(values: ['top', 'bottom', 'both'])]
        string $postion
    ): static {
        return new static($postion);
    }

    /**
     * Set menu filter input placeholder.
     *
     * @param string $placeholder
     *
     * @return \NormanHuth\NovaMenu\Services\MenuFilter
     */
    public function placeholder(string $placeholder): static
    {
        Inertia::share('menuAdvPlaceholder', $placeholder);

        return $this;
    }

    /**
     * Set menu filter empty text.
     *
     * @param string $text
     *
     * @return \NormanHuth\NovaMenu\Services\MenuFilter
     */
    public function emptyText(string $text): static
    {
        Inertia::share('menuAdvEmptyText', $text);

        return $this;
    }
}
