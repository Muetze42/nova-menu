# Use Font Awesome Icons

You can customize the Font Awesome icon displayed by invoking the `faIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuDisclosure;

MenuSection::make(__('Customers'), []
    ->faIcon('fa-solid fa-house'),
MenuGroup::make(__('Licensing'), [])
    ->faIcon('fa-solid fa-house'),
MenuItem::resource(User::class)
    ->faIcon('fa-solid fa-house'),
MenuDisclosure::make(__('Customers'), []
    ->faIcon('fa-solid fa-house'),
```

## Optional: Install Font Awesome

If you don't have Font Awesome integrated in Nova, but want to use it, you can optionally install Font Awesome Free with this command.

```nothing
php artisan nova-package:font-awesome
```
