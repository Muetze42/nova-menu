<?php

namespace NormanHuth\NovaMenu;

use Laravel\Nova\Menu\MenuGroup as Group;
use NormanHuth\NovaBasePackage\HasIcons;

class MenuGroup extends Group
{
    use HasIcons;
    use LabelTrait;
    use TooltipTrait;
    use IframeTrait;
    use FilterTrait;

    /**
     * Construct a new Menu Group instance.
     *
     * @param  string  $name
     * @param  array  $items
     */
    public function __construct($name, $items = [])
    {
        $this->icons['height'] = $this->iconHeight;

        parent::__construct($name, $items);
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
                'collapsable' => !$this->iframe['target'] ? $this->collapsable : false,
                'tooltip' => $this->tooltip,
                'component' => 'menu-group-norman-huth',
                'iframe' => $this->iframe,
                'classes' => $this->classes,
                'keywords' => $this->keywords,
                'filterClass' => $this->filterClass,
                'notFilterable' => $this->notFilterable,
            ],
        );
    }
}
