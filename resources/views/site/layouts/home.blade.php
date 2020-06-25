<!DOCTYPE html>
<html lang="{!! $locale !!}">

<head>
	@include('site.partials.head')
</head>

<body>

	{{-- LOADER --}}
	{{-- @include('site.partials.loader') --}}
	{{-- END LOADER --}}

	{{-- Home Popup Section --}}
	{{-- @include('site.partials.popup') --}}
	{{-- End Screen Load Popup Section --}}

	{{-- START HEADER --}}
	<header class="header_wrap fixed-top">
		@include('site.partials.header')
		@include('site.partials.menu')
	</header>
	{{-- END HEADER --}}

	{{-- START SECTION BANNER --}}
	@include('site.partials.banners.header')
	{{-- END SECTION BANNER --}}

	<div class="main_content">
		{{-- CARDS INFO --}}
		@include('site.partials.shopinfo')

		{{-- CONTENT --}}
		@yield('content')

		{{-- SUBSCRIBE NEWSLETTER --}}
		@include('site.partials.newsletter')
	</div>

	<footer class="bg_gray">
		@include('site.partials.footer')
	</footer>

	<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

	{{-- SCRIPTS --}}
	@include('site.partials.scripts')

</body>
</html>
