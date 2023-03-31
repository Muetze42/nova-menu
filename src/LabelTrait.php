<?php

namespace NormanHuth\NovaMenu;

trait LabelTrait
{
    /**
     * The icon height in pixel.
     *
     * @var int
     */
    protected int $iconHeight = 18;

    /**
     * Icon as label.
     *
     * @var bool
     */
    protected bool $asLabel = false;

    /**
     * Use Icon in label attribute.
     *
     * @return $this
     */
    public function asLabel(): static
    {
        $this->asLabel = true;

        return $this;
    }
}
