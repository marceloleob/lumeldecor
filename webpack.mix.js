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


// mix.autoload({
// 	jquery: ['$', 'global.jQuery', "jQuery", "global.$", "jquery", "global.jquery"]
// });

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/canvasjs.min.js', 'public/js')
	.js('resources/js/admin/canvas.js', 'public/js/admin')
    .sass('resources/sass/app.scss', 'public/css');

// mix.scripts([
// 	'resources/js/app.js',
// 	'resources/js/bootstrap.js',
// ], 'public/js/admin.js');

mix.styles([
	'resources/css/reset.css',
	'resources/css/architect-ui.css',
	'resources/css/animate.css',
	'resources/css/hamburger.css',
	'resources/css/custom-admin.css',
], 'public/css/admin.css');

// npm run dev
