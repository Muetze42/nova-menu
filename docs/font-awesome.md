# Use Font Awesome Icons

You can customize the Font Awesome icon displayed by invoking the `faIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), [] // [tl! focus]
            ->faIcon('chart-bar'), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->faIcon('chart-bar'), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->faIcon('chart-bar'), // [tl! focus]
        // ..
    ];
});
```

## Optional: Install Font Awesome

If you don't have Font Awesome integrated in Nova, but want to use it, you can optionally install Font Awesome Free with this command.

```nothing
php artisan nova-menu:font-awesome
```
