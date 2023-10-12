# Iframe Popup

To create an iframe popup element use the `iframe` factory method:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuSection::iframe('Norman Huth', 'https://huth.it'), // [tl! focus]
        MenuGroup::iframe('Norman Huth', 'https://huth.it'), // [tl! focus]
        MenuItem::iframe('Norman Huth', 'https://huth.it'), // [tl! focus]
        // ..
    ];
});
```

## Customize

### Iframe Element

#### Default attributes:

```json
{
    "classes": [],
    "styles": {
        "position": "fixed",
        "width": "100vw",
        "height": "100vh",
        "padding": "50px",
        "box-sizing": "border-box",
        "background-color": "rgba(0, 0, 0, 0.9)",
        "z-index": "200000",
        "left": "0",
        "top": "0",
        "border-radius": "5px"
    }
}
```

#### Add Classes To Iframe Element

You can add classes to the iframe class attribute by invoking the `addIframeClasses` method when defining the element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuItem::iframe('Norman Huth', 'https://huth.it') // [tl! focus]
            ->addIframeClasses(['iframe-popup', 'opacity-90']), // [tl! focus]
        // ..
    ];
});
```

#### Add Styles To Iframe Element

You can add styles to the iframe class attribute by invoking the `addIframeStyles` method when defining the element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuItem::iframe('Norman Huth', 'https://huth.it') // [tl! focus]
            ->addIframeStyles([ // [tl! focus]
                'padding' => '100px' // [tl! focus]
            ]), // [tl! focus]
        // ..
    ];
});
```

#### Set Iframe Styles

You can remove the styles add new styles to the iframe style attribute by invoking the `setIframeStyles` method when defining the
element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuItem::iframe('Norman Huth', 'https://huth.it') // [tl! focus]
            ->setIframeStyles([ // [tl! focus]
                'border' => '5px solid red' // [tl! focus]
            ]), // [tl! focus]
        // ..
    ];
});
```

### Iframe Wrapper Element

#### Default attributes:

```json
{
    "classes": [],
    "styles": {
        "background-color": "white",
        "width": "100%",
        "height": "100%"
    }
}
```

#### Add Classes To Iframe Wrapper Element

You can add classes to the iframe wrapper class attribute by invoking the `addIframeClasses` method when defining the element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuItem::iframe('Norman Huth', 'https://huth.it') // [tl! focus]
            ->addIframeClasses(['iframe-popup-wrapper', 'cursor-zoom-out']), // [tl! focus]
        // ..
    ];
});
```

#### Add Styles To Iframe Wrapper Element

You can add styles to the iframe wrapper class attribute by invoking the `addIframeStyles` method when defining the element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuItem::iframe('Norman Huth', 'https://huth.it') // [tl! focus]
            ->addIframeStyles([ // [tl! focus]
                'border' => '5px solid red' // [tl! focus]
            ]), // [tl! focus]
        // ..
    ];
});
```

#### Set Iframe Wrapper Element Styles

You can remove the styles add new styles to the iframe wrapper style attribute by invoking the `setIframeWrapperStyles` method when defining the
element:

```php
use NormanHuth\NovaMenu\MenuSection; // [tl! focus]
use NormanHuth\NovaMenu\MenuGroup; // [tl! focus]
use NormanHuth\NovaMenu\MenuItem; // [tl! focus]

Nova::mainMenu(function (Request $request) {
    return [
        //..
        MenuItem::iframe('Norman Huth', 'https://huth.it') // [tl! focus]
            ->setIframeWrapperStyles([ // [tl! focus]
                'border' => '5px solid red' // [tl! focus]
            ]), // [tl! focus]
        // ..
    ];
});
```
