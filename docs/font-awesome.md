# Use Font Awesome Icons

You can customize the Font Awesome icon displayed by invoking the `faIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuDisclosure;

MenuSection::make(__('Customers'), []
    ->faIcon('chart-bar'),
MenuGroup::make(__('Licensing'), [])
    ->faIcon('chart-bar'),
MenuItem::resource(User::class)
    ->faIcon('chart-bar'),
MenuDisclosure::make(__('Customers'), []
    ->faIcon('chart-bar'),
```

## Optional: Install Font Awesome

If you don't have Font Awesome integrated in Nova, but want to use it, you can optionally install Font Awesome Free with this command.

```nothing
php artisan nova-package:font-awesome
```
