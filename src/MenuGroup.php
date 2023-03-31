<?php

namespace NormanHuth\NovaMenu;

use Laravel\Nova\Menu\MenuGroup as Group;

class MenuGroup extends Group
{
    use IconTrait;
    use LabelTrait;

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
                        'height'  => $this->iconHeight,
                        'asLabel' => $this->asLabel,
                        'labelGap' => $this->labelGap,
                    ]
                ),
                'component' => 'menu-group-norman-huth'
            ],
        );
    }
}
