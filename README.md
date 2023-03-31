# Nova Menu Advanced

* ~~This package brings back the policy authorization for MenuItem~~ Include since Nova 4.2.5
* ~~Also, the well-known canSee method is added to MenuItem and MenuSection~~ Include since Nova 4.2.5
* ~~Empty menu sections are automatically hidden~~ Include since Nova 4.6.0
* Heroicon, Font Awesome, SVG & Image Icon for MenuSection, MenuGroup & MenuItem

![Preview](docs/preview.png)

## Instruction

**Font Awesome is not include in this package.**  
You can add Font Awesome JS or CSS for example in the `resources/vendor/nova/views/partials/meta.blade.php` file.

### Installation

```
composer require norman-huth/nova-menu
```

### Usage

* Use `NormanHuth\NovaMenu\MenuSection` instead of `Laravel\Nova\Menu\MenuSection`
* Use `NormanHuth\NovaMenu\MenuGroup` instead of `Laravel\Nova\Menu\MenuGroup`
* Use `NormanHuth\NovaMenu\MenuItem` instead of `Laravel\Nova\Menu\MenuItem`

#### Use Heroicon Icons

Use the `icon()` method.

```php
MenuSection::make(__('Customers'), [/**...**/])->icon('chart-bar'),
MenuGroup::make(__('Licensing'), [/**...**/])->icon('chart-bar'),
MenuItem::resource(User::class)->icon('chart-bar'),
```

#### Use Font Awesome Icon

Use the `faIcon()` method.

```php
MenuSection::make(__('Customers'), [/**...**/])->faIcon('fa-brands fa-laravel'),
MenuGroup::make(__('Licensing'), [/**...**/])->faIcon('fa-brands fa-laravel'),
MenuItem::resource(User::class)->faIcon('fa-brands fa-laravel'),
```

#### Use SVG Icon

Use the `svgIcon()` method.

##### Use SVG Directly

```php
MenuSection::make(__('Customers'), [/**...**/])->svgIcon('<svg xmlns="...'),
MenuGroup::make(__('Licensing'), [/**...**/])->svgIcon('<svg xmlns="...'),
MenuItem::resource(User::class)->svgIcon('<svg xmlns="...'),
```

##### Use SVG File

```php
MenuSection::make(__('Customers'), [/**...**/])->svgIcon(resource_path('icon.svg')),
MenuGroup::make(__('Licensing'), [/**...**/])->svgIcon(resource_path('icon.svg')),
MenuItem::resource(User::class)->svgIcon(resource_path('icon.svg')),
```

#### Use Image Icon

Use the `imageIcon()` method.

```php
MenuSection::make(__('Customers'), [/**...**/])->imageIcon(asset('images/car-icon.png')),
MenuGroup::make(__('Licensing'), [/**...**/])->imageIcon('https://domain.tld/images/icon.png'),
MenuItem::resource(User::class)->imageIcon('/images/icon.png'),
```

#### Use HTML Icon

Use the `htmlIcon()` method.

```php
MenuSection::make(__('Customers'), [/**...**/])->htmlIcon(/** Your HTML Code **/),
MenuGroup::make(__('Licensing'), [/**...**/])->htmlIcon(/** Your HTML Code **/),
MenuItem::resource(User::class)->htmlIcon(/** Your HTML Code **/),
```

#### Change Icon Height

Use the `iconHeight()` method.  
(Possible from 4 to 32 pixels)

```php
MenuSection::make(__('Customers'), [/**...**/])->iconHeight(24), // 24 default
MenuGroup::make(__('Licensing'), [/**...**/])->iconHeight(18), // 18 default
MenuItem::resource(User::class)->iconHeight(18), // 18 default
```

#### Use Icon In Label

Use the `asLabel()` method.  
(Only available for `MenuGroup` and `MenuItem`)

```php
MenuGroup::make(__('Licensing'), [/**...**/])->asLabel(),
MenuItem::resource(User::class)->asLabel(),
```

---

[![More Laravel Nova Packages](https://raw.githubusercontent.com/Muetze42/asset-repo/main/svg/more-laravel-nova-packages.svg)](https://huth.it/nova-packages)

[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://vshymanskyy.github.io/StandWithUkraine/)

[![Woman. Life. Freedom.](https://raw.githubusercontent.com/Muetze42/Muetze42/2033b219c6cce0cb656c34da5246434c27919bcd/files/iran-banner-big.svg)](https://linktr.ee/CurrentPetitionsFreeIran)
