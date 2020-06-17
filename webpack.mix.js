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

	// mix.browserSync({
	// 	// The browserSync injects these changes into the browser without requiring a manual refresh.
	// 	proxy: 'http://lumeldecor.test',
	// 	notify: false,
	// 	files: [
	// 		'./public/css/*.css',
	// 		'./public/js/*.js'
	// 	]
	// });


	// ADMIN AND WEBSITE
	mix
		.sass('resources/sass/app.scss', 'public/css')
		.js('resources/js/forms/jquery.masks.pt-br.js', 'public/js/forms')
		.js('resources/js/forms/jquery.validate.pt-br.js', 'public/js/forms');


	// SITE FILES
	mix
	.js('resources/js/site/app.js', 'public/js/site')
	.js('resources/js/libs/modernizr-custom.js', 'public/js/libs')
	.js([
		'resources/js/site/pages/contact.js',
	], 'public/js/site/pages.js')
	.sass('resources/sass/site/app.scss', 'public/css/site')
	.sass('resources/sass/site/animate.scss', 'public/css/site')
	.sass('resources/sass/site/style.scss', 'public/css/site')
	.sass('resources/sass/site/responsive.scss', 'public/css/site')
	.styles([
		'resources/sass/icons/ionicons.min.css',
		'resources/sass/icons/themify-icons.css',
		'resources/sass/icons/linearicons.css',
		'resources/sass/icons/flaticon.css',
		'resources/sass/icons/simple-line-icons.css',
		// 'resources/sass/icons/slick.css',
		// 'resources/sass/icons/slick-theme.css',
	], 'public/css/icons.css')
	.copy('resources/fonts/vendor', 'public/fonts/vendor');


	// ADMIN FILES
	mix
		.js('resources/js/admin/app.js', 'public/js/admin')
		.js([
			'resources/js/admin/ajax/category.js',
			'resources/js/admin/ajax/reason.js'
		], 'public/js/admin/ajax.js')
		.js([
			'resources/js/admin/pages/campaign.js',
			'resources/js/admin/pages/category.js',
			'resources/js/admin/pages/color.js',
			'resources/js/admin/pages/item.js',
			'resources/js/admin/pages/material.js',
			'resources/js/admin/pages/offer-coupon.js',
			'resources/js/admin/pages/offer-promotion.js',
			'resources/js/admin/pages/product.js',
			'resources/js/admin/pages/product-size.js',
			'resources/js/admin/pages/promotion.js',
			'resources/js/admin/pages/stock.js',
			'resources/js/admin/pages/theme.js',
		], 'public/js/admin/pages.js')
		.copy('resources/sass/admin/architect-ui.min.css', 'public/css/admin')
		.sass('resources/sass/admin/app.scss', 'public/css/admin');


	// mix.autoload({
	// 	jquery: ['$', 'window.jQuery', 'jQuery', 'window.$', 'jquery', 'window.jquery'],
	// 	'popper.js': ['Popper']
	// });
	// // The js method compile javascript files while the extract method extracts all your vendor libraries into their own file. Here, we are extracting jQuery and Bootstrap.
	// mix.extract(['jquery', 'popper.js', 'bootstrap']);
	// // enabling SourceMaps gets you the exact line and file of your code.
	// mix.options({ processCssUrls: false });

	if (!mix.inProduction()) {
		// This will provide extra debugging information to your browser’s developer tools.
		mix.webpackConfig({
			devtool: 'source-map'
		})
		.sourceMaps();
	}
