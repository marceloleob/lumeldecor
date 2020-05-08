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
	.js('resources/js/site/app.js', 'public/js/site')
    // CSS SITE
	.sass('resources/sass/site/app.scss', 'public/css/site')

    // JS ADMIN
	.js('resources/js/admin/app.js', 'public/js/admin')
	// JS ADMIN PAGES
	.js([
		'resources/js/admin/pages/category.js',
		// 'resources/js/admin/pages/color.js',
		// 'resources/js/admin/pages/customer.js',
		// 'resources/js/admin/pages/dashboard.js',
		'resources/js/admin/pages/material.js',
		// 'resources/js/admin/pages/coupon.js',
		// 'resources/js/admin/pages/promotion.js',
		'resources/js/admin/pages/product.js',
		// 'resources/js/admin/pages/email.js',
		// 'resources/js/admin/pages/stock.js',
		// 'resources/js/admin/pages/supplier.js',
		// 'resources/js/admin/pages/theme.js',
		// 'resources/js/admin/pages/user.js',
	], 'public/js/admin/pages.js')
	// JS FORMS
	.js('resources/js/forms/jquery.masks.en.js', 'public/js/forms')
	.js('resources/js/forms/jquery.masks.pt-br.js', 'public/js/forms')
	.js('resources/js/forms/jquery.masks.min.js', 'public/js/forms')
	.js('resources/js/forms/jquery.validate.en.js', 'public/js/forms')
	.js('resources/js/forms/jquery.validate.pt-br.js', 'public/js/forms')


    // CSS ADMIN
    .sass('resources/sass/admin/app.scss', 'public/css/admin')
    // CSS ADMIN TEMPLATE
    .copy('resources/sass/admin/architect-ui.min.css', 'public/css/admin')
    // CSS ADMIN CUSTOM
	.sass('resources/sass/admin/custom.scss', 'public/css/admin')

	// (nao deixa dar o warning de arquivo.map)
	.sourceMaps();
