# Use Heroicon Icons

You can customize a Heroicon icon displayed by invoking the `icon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->icon('chart-bar'), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->icon('chart-bar'), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->icon('chart-bar'), // [tl! focus]
        // ..
    ];
});
```
