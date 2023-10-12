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

    /**
     * @param string $tooltip
     *
     * @return \NormanHuth\NovaMenu\TooltipTrait
     */
    public function tooltip(string $tooltip): static
    {
        $this->tooltip = $tooltip;

        return $this;
    }
}
