<?php

namespace NormanHuth\NovaMenu;

use Laravel\Nova\Menu\MenuItem as Item;

class MenuItem extends Item
{
    use IconTrait;
    use LabelTrait;
    use TooltipTrait;
    use IframeTrait;

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
                'icons' => array_merge(
                    $this->icons,
                    [
                        'height' => $this->iconHeight,
                        'asLabel' => $this->asLabel,
                        'labelGap' => $this->labelGap,
                        'classes' => $this->classes,
                    ]
                ),
                'tooltip' => $this->tooltip,
                'component' => 'menu-item-norman-huth',
                'iframe' => $this->iframe,
                'classes' => '',
            ],
        );
    }
}
