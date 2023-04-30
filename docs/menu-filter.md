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
