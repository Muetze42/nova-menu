let mix = require('laravel-mix')
const tailwindcss = require('tailwindcss');

mix
    .setPublicPath('assets/tailwind')
    .css('resources/css/tailwind-colors.css', 'css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .version()
    .disableNotifications()
