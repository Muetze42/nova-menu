# Menu Filter

## Activate Filter

You can activate the filter by calling the `MenuFilter::activate` method.  
In the activate attribute you can define where the filter should be displayed.  
Valid options are `top`, `bottom` or `both` to display it on top and bottom.

```php
use NormanHuth\NovaMenu\Services\MenuFilter; // [tl! focus]

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
        MenuFilter::activate('top');  // [tl! focus]
```

## Add Keywords To A Element

You can add keywords to a menu element for the filter by invoking the `addKeywords` method when defining a menu element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->addKeywords(['Nature', 'Ocean']), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->addKeywords(['Nature', 'Ocean']), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->addKeywords(['Nature', 'Ocean']), // [tl! focus]
        MenuCard::make('info') // [tl! focus]
            ->addKeywords(['Nature', 'Ocean']), // [tl! focus]
        // ..
    ];
});
```

## Change Placeholder

You can change the default placeholder by invoking the `placeholder` when activate filter.  
Default: `__('Filter')`

```php
use NormanHuth\NovaMenu\Services\MenuFilter; // [tl! focus]

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
        MenuFilter::activate('top')  // [tl! focus]
            ->placeholder(__('Search menu'));  // [tl! focus]
```

## Change Empty Text

You can change the default empty text by invoking the `emptyText`
when activate filter.  
Default: `__('No :resource matched the given criteria.')` - resource: `__('menu entry')`

```php
use NormanHuth\NovaMenu\Services\MenuFilter; // [tl! focus]

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
        MenuFilter::activate('top')  // [tl! focus]
            ->emptyText(__('No items found'));  // [tl! focus]
```
