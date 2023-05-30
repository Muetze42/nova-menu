# Unfiltered elements

## Disable Filter For Menu Elements

You can disable the filter function for a menu element by invoking the `notFilterable` method when defining a menu element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]
use NormanHuth\NovaMenu\MenuCard; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::make(__('Customers'), []) // [tl! focus]
            ->notFilterable(), // [tl! focus]
        MenuGroup::make(__('Licensing'), []) // [tl! focus]
            ->notFilterable(), // [tl! focus]
        MenuItem::resource(User::class) // [tl! focus]
            ->notFilterable(), // [tl! focus]
        MenuCard::make('info') // [tl! focus]
            ->notFilterable(), // [tl! focus]
        // ..
    ];
});
```

## Create Additional Menu Over The Filter

You can create an additional menu over the filter by calling the `UnfilteredMainMenu::over` method.

```php
use NormanHuth\NovaMenu\UnfilteredMainMenu;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    protected function boot(): void
    {
        UnfilteredMainMenu::over(function (Request $request) {
            return [
                PerspektiveSelect::make(),
                MenuItem::resource(Post::class),
            ];
        });
    }
```


## Create Additional Menu Under The Filter

You can create an additional menu under the filter by calling the `UnfilteredMainMenu::under` method.

```php
use NormanHuth\NovaMenu\UnfilteredMainMenu;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    protected function boot(): void
    {
        UnfilteredMainMenu::under(function (Request $request) {
            return [
                PerspektiveSelect::make(),
                MenuItem::resource(Post::class),
            ];
        });
    }
```
