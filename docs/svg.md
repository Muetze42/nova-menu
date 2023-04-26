# Use SVG Icon

You can customize a Heroicon icon displayed by invoking the `svgIcon` method when defining the menu:

## Use SVG Directly

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->svgIcon('<svg xmlns="...'), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->svgIcon('<svg xmlns="...'), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->svgIcon('<svg xmlns="...'), // [tl! focus]
        // ..
    ]
});
```

## Use SVG File

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->svgIcon(resource_path('icon.svg')), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->svgIcon(resource_path('icon.svg')), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->svgIcon(resource_path('icon.svg')), // [tl! focus]
        // ..
    ]
});
```
