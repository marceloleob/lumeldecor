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

    mix
    // JS SITE
    .js('resources/js/site/app.js', 'public/js/site').sourceMaps()
    // JS ADMIN
    .js('resources/js/admin/app.js', 'public/js/admin').sourceMaps()
    // CSS SITE
    .sass('resources/sass/site/app.scss', 'public/css/site')
    // CSS ADMIN
    .sass('resources/sass/admin/app.scss', 'public/css/admin');
