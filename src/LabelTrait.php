<?php

namespace NormanHuth\NovaMenu;

use JetBrains\PhpStorm\ExpectedValues;

trait LabelTrait
{
    /**
     * The icon height in pixel.
     *
     */
    protected int $iconHeight = 18;

    /**
     * Icon as label.
     *
     */
    protected bool $asLabel = false;

    /**
     * The Label gap.
     *
     */
    protected float $labelGap = 1;

    /**
     * Use Icon in label attribute.
     *
     *
     * @return \NormanHuth\NovaMenu\LabelTrait
     */
    public function asLabel(
        #[ExpectedValues(values: [0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 5, 6, 8])]
        float $gap = 1
    ): static {
        $this->labelGap = $gap;
        $this->asLabel = true;

        return $this;
    }
}
