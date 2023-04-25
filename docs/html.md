# Use HTML Code As Icon

You can customize HTML code as icon displayed by invoking the `htmlIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;

MenuSection::make(__('Customers'), [/**...**/])
    ->htmlIcon(/** Your HTML Code **/),
MenuGroup::make(__('Licensing'), [/**...**/])
   ->htmlIcon(/** Your HTML Code **/),
MenuItem::resource(User::class)
   ->htmlIcon(/** Your HTML Code **/),
```
