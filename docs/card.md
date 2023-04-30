# Menu Card

This package adds the possibility to display cards in the menu.

## Usage

You can create a new menu card by calling the `MenuCard::make` method.

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make(), // [tl! focus]
        //..
    ];
});
```

### Set Content To A Card

#### Set String Content

You can set a string as content for a menu card by invoking the `content` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make() // [tl! focus]
            ->content('Norman Huth'), // [tl! focus]
        //..
    ];
});
```

#### Set Blade As Content

You can set a Blade template as content for a menu card by invoking the `view` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make() // [tl! focus]
            ->view('admin.news', ['name' => $request->user()->name])), // [tl! focus]
        //..
    ];
});
```

### Authorization

You can hide a card from a group of users by invoking the `canSee` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make() // [tl! focus]
            ->canSee(function (Request $request) {// [tl! focus]
                return str_ends_with($request->user()->email, '@huth.it');// [tl! focus]
            }), // [tl! focus]
        //..
    ];
});
```

### Customize And Theming

### Use A Theme

The static `make` method accept a theme argument. Valid themes are `info`, `success`, `warning` and `danger`.

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make('info'), // [tl! focus]
        //..
    ];
});
```

### Border Radius

You can add a border radius by invoking the `rounded` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make('info') // [tl! focus]
            ->rounded(), // [tl! focus]
        MenuCard::make('info') // [tl! focus]
            ->rounded('sm'), // [tl! focus]
        MenuCard::make('info') // [tl! focus]
            ->rounded('md'), // [tl! focus]
        MenuCard::make('info') // [tl! focus]
            ->rounded('lg'), // [tl! focus]
        //..
    ];
});
```

### Add Classes

You can add classes to the menu card class attribute by invoking the `addClasses` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make('info') // [tl! focus]
            ->addClasses(['text-center', 'text-white']), // [tl! focus]
        //..
    ];
});
```

### Add Styles

You can add styles to the menu card style attribute by invoking the `addStyles` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make('info') // [tl! focus]
            ->addStyles([ // [tl! focus]
                'color' => 'white', // [tl! focus]
                'text-align' => 'center', // [tl! focus]
            ]), // [tl! focus]
        //..
    ];
});
```

### Add `MenuItem` Spacing

You can add the same left margin spacing like a `MenuItem` by invoking the `asItem` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuCard::make('info') // [tl! focus]
            ->asItem(), // [tl! focus]
        //..
    ];
});
```
