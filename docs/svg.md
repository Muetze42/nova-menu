# Use SVG Icon

You can customize a Heroicon icon displayed by invoking the `svgIcon` method when defining the menu:

## Use SVG Directly

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuDisclosure;

MenuSection::make(__('Customers'), [])
    ->svgIcon('<svg xmlns="...'),
MenuGroup::make(__('Licensing'), [])
    ->svgIcon('<svg xmlns="...'),
MenuItem::resource(User::class)
    ->svgIcon('<svg xmlns="...'),
MenuDisclosure::make(__('Customers'), [])
    ->svgIcon('<svg xmlns="...'),
```

## Use SVG File

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuDisclosure;

MenuSection::make(__('Customers'), [])
    ->svgIcon(resource_path('icon.svg')),
MenuGroup::make(__('Licensing'), [])
    ->svgIcon(resource_path('icon.svg')),
MenuItem::resource(User::class)
    ->svgIcon(resource_path('icon.svg')),
MenuDisclosure::make(__('Customers'), [])
    ->svgIcon(resource_path('icon.svg')),
```
