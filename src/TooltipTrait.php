<?php

namespace NormanHuth\NovaMenu;

trait TooltipTrait
{
    /**
     * The Item Tooltip.
     *
     */
    protected ?string $tooltip = null;

    /**
     *
     * @return \NormanHuth\NovaMenu\TooltipTrait
     */
    public function tooltip(string $tooltip): static
    {
        $this->tooltip = $tooltip;

        return $this;
    }
}
