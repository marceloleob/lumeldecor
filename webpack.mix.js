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
		.sass('resources/assets/sass/app.scss', 'public/css')
		.js('resources/assets/js/forms/jquery.masks.pt-br.js', 'public/js/forms')
		.js('resources/assets/js/forms/jquery.validate.pt-br.js', 'public/js/forms');


	// SITE FILES
	mix
	.js('resources/assets/js/site/app.js', 'public/js/site')
	.js('resources/assets/js/modernizr-custom.js', 'public/js')
	.js([
		'resources/assets/js/site/pages/contact.js',
		'resources/assets/js/site/pages/home.js',
		'resources/assets/js/site/pages/product-detail.js',
	], 'public/js/site/pages.js')
	.sass('resources/assets/sass/site/app.scss', 'public/css/site')
	.sass('resources/assets/sass/site/animate.scss', 'public/css/site')
	.sass('resources/assets/sass/site/style.scss', 'public/css/site')
	.sass('resources/assets/sass/site/responsive.scss', 'public/css/site')
	.styles([
		'resources/assets/sass/icons/ionicons.min.css',
		'resources/assets/sass/icons/themify-icons.css',
		'resources/assets/sass/icons/linearicons.css',
		'resources/assets/sass/icons/flaticon.css',
		'resources/assets/sass/icons/simple-line-icons.css',
	], 'public/css/icons.css')
	.copy('resources/assets/fonts/vendor', 'public/fonts/vendor');


	// ADMIN FILES
	mix
		.js('resources/assets/js/admin/app.js', 'public/js/admin')
		.js([
			'resources/assets/js/admin/pages/campaign.js',
			'resources/assets/js/admin/pages/category.js',
			'resources/assets/js/admin/pages/color.js',
			'resources/assets/js/admin/pages/item.js',
			'resources/assets/js/admin/pages/material.js',
			'resources/assets/js/admin/pages/offer-coupon.js',
			'resources/assets/js/admin/pages/offer-promotion.js',
			'resources/assets/js/admin/pages/product.js',
			'resources/assets/js/admin/pages/product-size.js',
			'resources/assets/js/admin/pages/promotion.js',
			'resources/assets/js/admin/pages/stock.js',
			'resources/assets/js/admin/pages/theme.js',
		], 'public/js/admin/pages.js')
		.copy('resources/assets/sass/admin/architect-ui.min.css', 'public/css/admin')
		.sass('resources/assets/sass/admin/app.scss', 'public/css/admin');


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
