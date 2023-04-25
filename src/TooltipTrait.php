<?php

namespace NormanHuth\NovaMenu;

trait TooltipTrait
{
    /**
     * The Item Tooltip.
     *
     * @var string|null
     */
    protected ?string $tooltip = null;

    public function tooltip(string $tooltip): static
    {
        $this->tooltip = $tooltip;

        return $this;
    }
}
