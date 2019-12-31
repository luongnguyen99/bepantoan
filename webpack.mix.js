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

mix.styles([
    // 'public/client/css/aos.css',
    // 'public/client/css/bootstrap.min.css',
    // 'public/client/css/font-akr.css',
    // 'public/client/css/font-awesome.min.css',
    // 'public/client/css/helper.css',
    // 'public/client/css/owl.carousel.min.css',
    // 'public/client/css/owl.theme.default.min.css',
    // 'public/client/css/pe-icon-7-stroke.css',
    'public/client/css/style.css',
    // 'public/client/css/w3.css',

 ], 'public/client/css/all-css.css');
