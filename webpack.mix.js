const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
    'resources/assets/js/jquery-1.10.1.js',
    'resources/assets/js/bootstrap.min.js',
  ], 'public/js');
mix.css([
    'resources/assets/css/bootstrap.min.css',
  ], 'public/css');
