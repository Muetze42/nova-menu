# Use An Image As Icon

You can customize an image as icon displayed by invoking the `imageIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuDisclosure;

MenuSection::make(__('Customers'), [])
     ->imageIcon(asset('images/car-icon.png')),
 MenuGroup::make(__('Licensing'), [])
     ->imageIcon('https://domain.tld/images/icon.png'),
 MenuItem::resource(User::class)
     ->imageIcon('/images/icon.png'),
MenuDisclosure::make(__('Customers'), [])
     ->imageIcon(asset('images/car-icon.png')),
```
