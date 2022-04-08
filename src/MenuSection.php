<?php

namespace NormanHuth\NovaMenu;


use Laravel\Nova\AuthorizedToSee;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuSection as BaseMenuSection;
use Laravel\Nova\URL;

class MenuSection extends BaseMenuSection
{
    use AuthorizedToSee;

    protected ?string $faIcon = null;

    public function faIcon(string $faIcon): static
    {
        $this->faIcon = $faIcon;

        return $this;
    }

    /**
     * Construct a new Menu Section instance.
     *
     * @param  string  $name
     * @param  array|iterable  $items
     * @param  string  $icon
     */
    public function __construct($name, $items = [], $icon = 'collection')
    {
        parent::__construct($name, $items, $icon);
        $this->items = $this->items->filter(function ($item) {
            return !empty($item->jsonSerialize());
        });
    }

    /**
     * Prepare the menu for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $url = !empty($this->path) ? URL::make($this->path) : null;
        $request = app(NovaRequest::class);

        $component = $this->faIcon ? 'menu-section-fa' : 'menu-section';
        $icon = $this->faIcon ?: $this->icon;

        if (!empty(json_decode($this->items)) && $this->authorizedToSee($request)) {
            return [
                'key' => md5($this->name.'-'.$this->path),
                'name' => $this->name,
                'component' => $component,
                'items' => $this->items,
                'collapsable' => $this->collapsable,
                'icon' => $icon,
                'path' => (string) $url,
                'active' => optional($url)->active() ?? false,
            ];
        }
        return [];
    }
}
