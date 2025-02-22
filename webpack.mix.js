let mix = require('laravel-mix')
let NovaExtension = require('laravel-nova-devtool')

mix.extend('nova', new NovaExtension())

mix
  .setPublicPath('dist')
  .js('resources/js/tool.js', 'js')
  .vue({ version: 3 })
  .sass('resources/scss/tool.scss', 'css')
  .nova('norman-huth/nova-menu')
  .webpackConfig({
    externals: {
      'laravel-nova-ui': 'LaravelNovaUi',
    }
  })
  .version()
  .disableNotifications()

