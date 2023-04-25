# Use HTML Code As Icon

You can customize HTML code as icon displayed by invoking the `htmlIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;

MenuSection::make(__('Customers'), [/**...**/])
    ->htmlIcon(asset('images/car-icon.png')),
MenuGroup::make(__('Licensing'), [/**...**/])
    ->htmlIcon('https://domain.tld/images/icon.png'),
MenuItem::resource(User::class)
    ->htmlIcon('/images/icon.png'),
```
