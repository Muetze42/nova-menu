[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://vshymanskyy.github.io/StandWithUkraine/)

# Nova Menu Permissions

This package is for Nova 4.

* This package brings back the policy authorization for MenuItem
* Also, the well-known canSee method is added to MenuItem and MenuSection
* Empty menu sections are automatically hidden
* Optionally Font Awesome Icons can be used

## Install

```
composer require norman-huth/nova-menu
```

## Usage

* Use `NormanHuth\NovaMenu\MenuItem` instead of `Laravel\Nova\Menu\MenuItem`
* Use `NormanHuth\NovaMenu\MenuSection` instead of `Laravel\Nova\Menu\MenuSection`

`MenuItem` check the `viewAny` method if a policy for the model exists.

Example: `canSee` method for `MenuSection`

```php
use NormanHuth\NovaMenu\MenuSection; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make(__('Customers'), [
                    // Menu Items
                ])->icon('user')
                    ->collapsable()
                    ->canSee(function () use ($request) {
                        return $request->user()->is_admin;
                    }),
            ];
        });
    }
```

Example: `canSee` method for `MenuItem`

```php
use NormanHuth\NovaMenu\MenuItem; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make(__('Customers'), [
                    MenuItem::resource(User::class)
                        ->canSee(function () use ($request) {
                            return $request->user()->is_admin;
                        }),
                ])->icon('user')->collapsable()
            ];
        });
    }
```

---

## Custom Icon Usage

Use Font Awesome with `faIcon()`

```php
use NormanHuth\NovaMenu\MenuSection; // <!- Use this

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
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

### Font Awesome is not on board at all?

This package doesn't include Font Awesome. The font must still be added manually.  
How you do that is up to you. Here is one way:

* Copy the file `vendor/laravel/nova/resources/views/layout.blade.php` to `resources/views/vendor/nova/layout.blade.php`
* Add your Font Awesome library in the layout

---
[![More Laravel Nova Packages](https://raw.githubusercontent.com/Muetze42/asset-repo/main/svg/more-laravel-nova-packages.svg)](https://huth.it/nova-packages)
