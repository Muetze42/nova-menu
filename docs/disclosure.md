# Menu Disclosure

This item is intended for the user menu.

## Usage

You can create a new menu disclosure by calling the `MenuDisclosure::make` method.

```php
use NormanHuth\NovaMenu\MenuDisclosure; // [tl! focus]

public function boot()
{
    Nova::userMenu(function (Request $request, Menu $menu) {
        $menu->prepend(
            MenuDisclosure::make(__('Test 32'), [ // [tl! focus]
                MenuItem::make(
                    'My Profile',
                    "/resources/users/{$request->user()->getKey()}"
                ),
            ]), // [tl! focus]
        );

        return $menu;
    });
}
```
