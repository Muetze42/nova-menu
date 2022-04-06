# Nova Menu Permissions

This package is for Nova 4. 

This package brings back the policy authorization for MenuItem.  
Also, the well-known canSee method is added to MenuItem and MenuSection.

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
## Todo
Hide: `MenuSection` if empty
