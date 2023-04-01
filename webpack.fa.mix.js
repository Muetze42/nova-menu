let mix = require('laravel-mix')

mix
    .setPublicPath('assets/font-awesome')
    .sass('resources/scss/fontawesome.scss', 'css')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'assets/font-awesome/webfonts')
    .version()
    .disableNotifications()
