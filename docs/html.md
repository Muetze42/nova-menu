# Use HTML Code As Icon

You can customize HTML code as icon displayed by invoking the `htmlIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->htmlIcon('YOUR-HTML-CODE'), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
           ->htmlIcon('YOUR-HTML-CODE'), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
           ->htmlIcon('YOUR-HTML-CODE'), // [tl! focus]
    ];
});
```
