# Nova Menu Advanced

This package is for Nova 4.

* ~~This package brings back the policy authorization for MenuItem~~ Include since Nova 4.2.5
* ~~Also, the well-known canSee method is added to MenuItem and MenuSection~~ Include since Nova 4.2.5
* ~~Empty menu sections are automatically hidden~~ Include since Nova 4.6.0
* Heroicon & Font Awesome Icon for MenuSection, MenuItem & MenuGroup

## Install

```
composer require norman-huth/nova-menu
```

## Description

* Use `NormanHuth\NovaMenu\MenuSection` instead of `Laravel\Nova\Menu\MenuSection`
* Use `NormanHuth\NovaMenu\MenuItem` instead of `Laravel\Nova\Menu\MenuItem`
* Use `NormanHuth\NovaMenu\MenuGroup` instead of `Laravel\Nova\Menu\MenuGroup`

---

## Usage

### Font Awesome icon in MenuSection

Use the `faIcon` method:

```php
use NormanHuth\NovaMenu\MenuSection; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make(__('Customers'), [
                    // Menu Items
                ])->collapsable()
                ->faIcon('fa-brands fa-laravel')
            ];
        });
    }
```

### MenuGroup icons

#### Use Heroicon in MenuGroup

Use the `icon` method

```php
use NormanHuth\NovaMenu\MenuGroup; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();
        Nova::mainMenu(function (Request $request) {
            return [
                MenuGroup::make(__('Customers'), [
                    // Menu Items
                ])->icon('chart-bar')
            ];
        });
    }
```

#### Use Font Awesome in MenuGroup

Use the `faIcon` method

```php
use NormanHuth\NovaMenu\MenuGroup; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();
        Nova::mainMenu(function (Request $request) {
            return [
                MenuGroup::make(__('Customers'), [
                    // Menu Items
                ])->faIcon('fa-brands fa-laravel')
            ];
        });
    }
```

### MenuItem icons

#### Use Heroicon in MenuItem

Use the `icon` method

```php
use NormanHuth\NovaMenu\MenuItem; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        //--
        MenuItem::resource(User::class)->icon('chart-bar'),
        //--
    }
```

#### Use Font Awesome in MenuItem

Use the `faIcon` method

```php
use NormanHuth\NovaMenu\MenuItem; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        //--
        MenuItem::resource(User::class)->faIcon('fa-brands fa-laravel'),
        //--
    }
```

#### Use the MenuItem or MenuGroup icon as label

Use the `asLabel` method

```php
use NormanHuth\NovaMenu\MenuItem; // <!- Use this
use NormanHuth\NovaMenu\MenuGroup; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot()
    {
        //--
        MenuItem::resource(User::class)->icon('chart-bar')->asLabel(),
        MenuItem::resource(User::class)->faIcon('fa-brands fa-laravel')->asLabel(),
        //--
        MenuGroup::make('Twitch', [
        //--
        ])->faIcon('fa-brands fa-twitch')->asLabel(),
        //--
    }
```

### Font Awesome is not on board at all?

This package doesn't include Font Awesome. The font must still be added manually.  
How you do that is up to you. Here is one way:

* Add Your Font Awesome JS oder CSS in `resources/vendor/nova/views/partials/meta.blade.php`

---
[![More Laravel Nova Packages](https://raw.githubusercontent.com/Muetze42/asset-repo/main/svg/more-laravel-nova-packages.svg)](https://huth.it/nova-packages)


[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://vshymanskyy.github.io/StandWithUkraine/)

[![Woman. Life. Freedom.](https://raw.githubusercontent.com/Muetze42/Muetze42/2033b219c6cce0cb656c34da5246434c27919bcd/files/iran-banner-big.svg)](https://linktr.ee/CurrentPetitionsFreeIran)
