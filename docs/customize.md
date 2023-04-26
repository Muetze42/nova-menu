# Customize Menu And Icons

## Use Icon In Label

You can use the `MenuGroup` and `MenuItem` icons as label by invoking the `asLabel` method.

```php
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->asLabel(), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->asLabel(), // [tl! focus]
        //..
    ]
});
```

## Controlling Gutters Between Icon And Label

You can control the gutter between icon and label by invoking the `asLabel` method.

**Default**: 1 (0.25rem)

| Method           | Gap      |
|------------------|----------|
| `->asLabel(0.5)` | 0.125rem |
| `->asLabel(1.5)` | 0.375rem |
| `->asLabel(2)`   | 0.5rem   |
| `->asLabel(2.5)` | 0.625rem |
| `->asLabel(3)`   | 0.75rem  |
| `->asLabel(3.5)` | 0.875rem |
| `->asLabel(4)`   | 1rem     |
| `->asLabel(5)`   | 1.25rem  |
| `->asLabel(6)`   | 1.5rem   |
| `->asLabel(8)`   | 2rem     |

```php
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->asLabel(2), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->asLabel(3.5), // [tl! focus]
        //..
    ]
});
```

## Change Icon Height

You can change the icon height by invoking the `iconHeight` method. 

(Value `int` in Pixel. Possible from `4 to 32` pixels)

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), [])->iconHeight(24), // MenuSection: 24 default [tl! focus]
        MenuGroup::make(__('Licensing'), [])->iconHeight(18),   // MenuGroup: 18 default [tl! focus]
        MenuItem::resource(User::class)->iconHeight(18),                 // MenuItem: 18 default [tl! focus]
        // ..
    ]
});
```

## Add Classes To Element

You can add classes attribute to the element by invoking the `elemClasses` method.

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->elemClasses(['class-1', 'class-2']), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->elemClasses(['class-1', 'class-2']), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->elemClasses(['class-1', 'class-2']), // [tl! focus]
        
        // Or as String
        MenuSection::make(__('Customers'), [])
            ->elemClasses('class-1 class-2'),
        MenuGroup::make(__('Licensing'), [])
            ->elemClasses('class-1 class-2'),
        MenuItem::resource(User::class)
            ->elemClasses('class-1 class-2'),
        //..
    ]
});
```

## Add Classes To Icon

You can add classes attribute to the icon by invoking the `iconClasses` method.

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->iconClasses(['class-1', 'class-2']), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->iconClasses(['class-1', 'class-2']), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->iconClasses(['class-1', 'class-2']), // [tl! focus]
        
        // Or as String
        MenuSection::make(__('Customers'), [])
            ->iconClasses('class-1 class-2'),
        MenuGroup::make(__('Licensing'), [])
            ->iconClasses('class-1 class-2'),
        MenuItem::resource(User::class)
            ->iconClasses('class-1 class-2'),
        // ..
    ]
});
```

## Add Classes To Label

You can add classes attribute to the label by invoking the `labelClasses` method.

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->labelClasses(['class-1', 'class-2']), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->labelClasses(['class-1', 'class-2']), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->labelClasses(['class-1', 'class-2']), // [tl! focus]
        
        // Or as String
        MenuSection::make(__('Customers'), [])
            ->labelClasses('class-1 class-2'),
        MenuGroup::make(__('Licensing'), [])
            ->labelClasses('class-1 class-2'),
        MenuItem::resource(User::class)
            ->labelClasses('class-1 class-2'),
        // ..
    ]
});
```

## Optional: Tailwind CSS Colors

Install all Tailwind CSS [Text Color](https://tailwindcss.com/docs/text-color), [Border Color](https://tailwindcss.com/docs/border-color) and
[Background Color](https://tailwindcss.com/docs/background-color) classes inclusive dark mode classes.

**But beware. This file will be loaded 620KB more CSS!**

```nothing
php artisan nova-menu:tailwind-colors
```
