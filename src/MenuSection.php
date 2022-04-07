<?php

namespace NormanHuth\NovaMenu;


use Illuminate\Support\Facades\Log;
use Laravel\Nova\AuthorizedToSee;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuSection as BaseMenuSection;
use Laravel\Nova\URL;

class MenuSection extends BaseMenuSection
{
    use AuthorizedToSee;

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

        if (!empty(json_decode($this->items)) && $this->authorizedToSee($request)) {
            return [
                'key' => md5($this->name.'-'.$this->path),
                'name' => $this->name,
                'component' => 'menu-section',
                'items' => $this->items,
                'collapsable' => $this->collapsable,
                'icon' => $this->icon,
                'path' => (string) $url,
                'active' => optional($url)->active() ?? false,
            ];
        }
        return [];
    }
}
