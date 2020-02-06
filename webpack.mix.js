const mix = require('laravel-mix');

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
    'resources/js/app.js',
    'resources/js/admin/category.js',
    'resources/js/admin/user.js',
    'resources/js/admin/product.js',
    'resources/js/order.js',
    'resources/js/cart.js',
    'resources/js/admin/dashboard.js',
    ], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/box-chat.scss', 'public/css');
