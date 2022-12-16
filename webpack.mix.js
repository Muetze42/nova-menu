let mix = require('laravel-mix')

require('./nova.mix')

mix
    .setPublicPath('dist')
    .js('resources/js/tool.js', 'js')
    .sass('resources/scss/tool.scss', 'css')
    .vue({version: 3})
    .nova('norman-huth/nova-menu')
