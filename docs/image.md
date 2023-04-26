# Use An Image As Icon

You can customize an image as icon displayed by invoking the `imageIcon` method when defining the menu:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->imageIcon(asset('images/car-icon.png')), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->imageIcon('https://domain.tld/images/icon.png'), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->imageIcon('/images/icon.png'), // [tl! focus]
        // ..
    ]
});
```
