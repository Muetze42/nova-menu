<?php

namespace NormanHuth\NovaMenu;

use Laravel\Nova\Menu\MenuSection as Section;
use NormanHuth\NovaBasePackage\HasIcons;

class MenuSection extends Section
{
    use HasIcons;
    use TooltipTrait;
    use IframeTrait;
    use FilterTrait;

    /**
     * The icon height in pixel.
     *
     * @var int
     */
    protected int $iconHeight = 24;

    /**
     * Construct a new Menu Section instance.
     *
     * @param  string  $name
     * @param  array|iterable  $items
     * @param  string  $icon
     */
    public function __construct($name, $items = [], $icon = 'collection')
    {
        $this->icons['height'] = $this->iconHeight;

        parent::__construct($name, $items, $icon);
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
                'icons' => array_merge($this->icons, [
                    'classes' => $this->classes,
                ]),
                'collapsable' => !$this->iframe['target'] ? $this->collapsable : false,
                'tooltip' => $this->tooltip,
                'component' => 'menu-section-norman-huth',
                'iframe' => $this->iframe,
                'classes' => $this->classes,
                'keywords' => $this->keywords,
                'filterClass' => $this->filterClass,
                'notFilterable' => $this->notFilterable,
            ],
        );
    }
}
