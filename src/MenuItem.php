<?php

namespace NormanHuth\NovaMenu;

use Exception;
use Laravel\Nova\Menu\MenuItem as BaseMenuItem;
use Laravel\Nova\Nova;
use Laravel\Nova\URL;

class MenuItem extends BaseMenuItem
{
    protected bool $isAwesome = false;
    protected bool $asLabel = false;

    /**
     * The menu's component.
     *
     * @var string
     */
    public $component = 'menu-item-norman-huth';

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
     * Use Icon in label attribute
     *
     * @return $this
     */
    public function asLabel(): static
    {
        $this->asLabel = true;

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
     * @throws Exception
     */
    public function jsonSerialize(): array
    {
        $url = URL::make($this->path, $this->external);

        return [
            'name'      => Nova::__($this->name),
            'component' => $this->component,
            'path'      => (string)$url,
            'external'  => $this->external,
            'target'    => $this->target,
            'method'    => $this->method,
            'data'      => $this->data,
            'headers'   => $this->headers,
            'active'    => $url->active(),
            'badge'     => $this->resolveBadge(),
            'icon'      => $this->icon,
            'awesome'   => $this->isAwesome,
            'as_label'  => $this->asLabel,
        ];
    }
}
