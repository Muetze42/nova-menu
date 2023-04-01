<?php

namespace NormanHuth\NovaMenu;

use Laravel\Nova\Menu\MenuSection as Section;

class MenuSection extends Section
{
    use IconTrait;

    /**
     * The icon height in pixel.
     *
     * @var int
     */
    protected int $iconHeight = 24;

    /**
     * Prepare the menu for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'icons' => array_merge($this->icons, [
                    'height'  => $this->iconHeight,
                    'classes' => $this->classes,
                ]),
                'component' => 'menu-section-norman-huth'
            ],
        );
    }
}
