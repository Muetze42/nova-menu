<?php

namespace NormanHuth\NovaMenu;


use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuSection as BaseMenuSection;
use Laravel\Nova\URL;

class MenuSection extends BaseMenuSection
{
    protected ?string $faIcon = null;

    public function faIcon(string $faIcon): static
    {
        $this->faIcon = $faIcon;

        return $this;
    }

    /**
     * Prepare the menu for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $request = app(NovaRequest::class);
        $url = ! empty($this->path) ? URL::make($this->path) : null;

        $component = $this->faIcon ? 'menu-section-fa' : 'menu-section';
        $icon = $this->faIcon ?: $this->icon;

        return [
            'key' => md5($this->name.'-'.$this->path),
            'name' => $this->name,
            'component' => $component,
            'items' => $this->items->authorized($request)->withoutEmptyItems()->all(),
            'collapsable' => $this->collapsable,
            'icon' => $icon,
            'path' => (string) $url,
            'active' => optional($url)->active() ?? false,
            'badge' => $this->resolveBadge(),
        ];
    }
}
