let mix = require('laravel-mix')

require('./nova.mix')

mix
    .setPublicPath('dist')
    .js('resources/js/tool.js', 'js')
    .vue({version: 3})
    .sass('resources/scss/tool.scss', 'css')
    .nova('norman-huth/nova-menu')
    .disableNotifications()
