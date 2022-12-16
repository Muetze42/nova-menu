# Nova Menu Advanced

This package is for Nova 4. 

* ~~This package brings back the policy authorization for MenuItem~~ Include since Nova 4.2.5
* ~~Also, the well-known canSee method is added to MenuItem and MenuSection~~ Include since Nova 4.2.5
* ~~Empty menu sections are automatically hidden~~ Include since Nova 4.6.0
* Optionally Font Awesome Icons can be used

## Install
```
composer require norman-huth/nova-menu
```

## Usage
* ~~Use `NormanHuth\NovaMenu\MenuItem` instead of `Laravel\Nova\Menu\MenuItem`~~
* Use `NormanHuth\NovaMenu\MenuSection` instead of `Laravel\Nova\Menu\MenuSection`
 
---
## Usage
Use Font Awesome with `faIcon()`

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

### Font Awesome is not on board at all?
This package doesn't include Font Awesome. The font must still be added manually.  
How you do that is up to you. Here is one way:
* Add Your Font Awesome JS oder CSS in `resources/vendor/nova/views/partials/meta.blade.php`
