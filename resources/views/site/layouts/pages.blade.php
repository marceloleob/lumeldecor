<!DOCTYPE html>
<html lang="{!! $locale !!}">

<head>
	@include('site.partials.head')
</head>

<body>

	{{-- LOADER --}}
	{{-- @include('site.partials.loader') --}}
	{{-- END LOADER --}}

	{{-- START HEADER --}}
	<header class="header_wrap fixed-top">
		@include('site.partials.header')
		@include('site.partials.menu')
	</header>
	{{-- END HEADER --}}

	{{-- START BREADCRUMB --}}
	{{-- <div class="breadcrumb_section bg_lumel_gray page-title-mini">
		@include('site.partials.breadcrumb')
	</div> --}}
	{{-- END BREADCRUMB --}}

	<div class="main_content">
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
