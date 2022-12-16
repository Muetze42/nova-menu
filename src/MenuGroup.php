<?php

namespace NormanHuth\NovaMenu;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuGroup as Group;

class MenuGroup extends Group
{
    protected bool $isAwesome = false;

    /**
     * The menu's component.
     *
     * @var string
     */
    public $component = 'menu-group-norman-huth';

    /**
     * Set Font Awesome icon to the menu
     *
     * @param string $faIcon
     * @return $this
     */
    public function faIcon(string $faIcon): static
    {
        $this->icon = $faIcon;
        $this->isAwesome = true;

        return $this;
    }

    /**
     * Set Heroicon icon to the menu.
     *
     * @param string $icon
     * @return $this
     */
    public function icon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * the menu's icon.
     *
     * @var string|null
     */
    public ?string $icon = null;


    /**
     * Prepare the menu for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $request = app(NovaRequest::class);

        return [
            'component'   => $this->component,
            'name'        => $this->name,
            'items'       => $this->items->authorized($request)->withoutEmptyItems()->all(),
            'collapsable' => $this->collapsable,
            'key'         => $this->key(),
            'icon'        => $this->icon,
            'awesome'     => $this->isAwesome,
        ];
    }
}
