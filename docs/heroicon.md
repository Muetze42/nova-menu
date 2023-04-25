# Use Heroicon Icons

You can customize a Heroicon icon displayed by invoking the `icon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;

MenuSection::make(__('Customers'), [/**...**/])
    ->icon('chart-bar'),
MenuGroup::make(__('Licensing'), [/**...**/])
    ->icon('chart-bar'),
MenuItem::resource(User::class)
    ->icon('chart-bar'),
```
