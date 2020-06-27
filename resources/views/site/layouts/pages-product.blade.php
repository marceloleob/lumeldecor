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
	<header class="header_wrap">
		@include('site.partials.header')
		@include('site.partials.menu')
	</header>
	{{-- END HEADER --}}

	{{-- START BREADCRUMB --}}
	<div class="breadcrumb_section bg_lumel_gray page-title-mini">
		{{-- @include('site.partials.breadcrumb') --}}
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="page-title">
						<h1>{!! $title !!}</h1>
					</div>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb justify-content-md-end">
						<li class="breadcrumb-item"><a href="{!! route('home') !!}">Página Inicial</a></li>
						@yield('breadcrumb')
					</ol>
				</div>
			</div>
		</div>
	</div>
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
