# Use HTML Code As Icon

You can customize HTML code as icon displayed by invoking the `htmlIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuDisclosure;

MenuSection::make(__('Customers'), [])
    ->htmlIcon('YOUR-HTML-CODE'),
MenuGroup::make(__('Licensing'), [])
   ->htmlIcon('YOUR-HTML-CODE'),
MenuItem::resource(User::class)
   ->htmlIcon('YOUR-HTML-CODE'),
MenuDisclosure::make(__('Customers'), [])
    ->htmlIcon('YOUR-HTML-CODE'),
```
