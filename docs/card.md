# Menu Card

This package adds the possibility to display cards in the menu.

## Usage

You can create a new menu card by calling the `MenuCard::make` method.

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make()
```

### Set Content To A Card

#### Set String Content

You can set a string as content for a menu card by invoking the `content` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make()
    ->content('Norman Huth'),
```

#### Set Blade As Content

You can set a Blade template as content for a menu card by invoking the `view` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make()
    ->view('admin.news', ['name' => $request->user()->name])),
```

### Authorization

You can hide certain fields from a group of users by invoking the `canSee` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make()
    ->canSee(function (Request $request) {
        return str_ends_with($request->user()->email, '@huth.it');
    }),
```

### Customize And Theming

### Use A Theme

The static `make` method accept a theme argument. Valid themes are `info`, `success`, `warning` and `danger`.

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make('info'),
```

### Border Radios

You can add a border radius by invoking the `rounded` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make('info')
    ->rounded(),
MenuCard::make('info')
    ->rounded('sm'),
MenuCard::make('info')
    ->rounded('md'),
MenuCard::make('info')
    ->rounded('lg'),
```

### Add Classes

You can add classes to the menu card class attribute by invoking the `addClasses` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make()
    ->addClasses(['text-center', 'text-white']),
```

### Add Styles

You can add styles to the menu card style attribute by invoking the `addStyles` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make()
    ->addStyles([
        'color' => 'white',
        'text-align' => 'center',
    ]),
```

### Add `MenuItem` Spacing

You can add the same left margin spacing like a `MenuItem` by invoking the `asItem` method when defining the menu card:

```php
use NormanHuth\NovaMenu\MenuCard;

MenuCard::make()
    ->asItem(),
```
