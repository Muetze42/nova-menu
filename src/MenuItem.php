<?php

namespace NormanHuth\NovaMenu;

use Laravel\Nova\Menu\MenuItem as Item;
use NormanHuth\NovaBasePackage\HasIcons;

class MenuItem extends Item
{
    use HasIcons;
    use LabelTrait;
    use TooltipTrait;
    use IframeTrait;
    use FilterTrait;

    /**
     * Construct a new Menu Item instance.
     *
     * @param  string  $name
     * @param  string|null  $path
     */
    public function __construct($name, $path = null)
    {
        $this->icons['height'] = $this->iconHeight;
        parent::__construct($name, $path);
    }

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
                        'asLabel' => $this->asLabel,
                        'labelGap' => $this->labelGap,
                        'classes' => $this->classes,
                    ]
                ),
                'tooltip' => $this->tooltip,
                'component' => 'menu-item-norman-huth',
                'iframe' => $this->iframe,
                'classes' => $this->classes,
                'keywords' => $this->keywords,
                'filterClass' => $this->filterClass,
                'notFilterable' => $this->notFilterable,
            ],
        );
    }
}
