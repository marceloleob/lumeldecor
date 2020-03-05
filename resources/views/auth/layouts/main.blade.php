<!DOCTYPE html>
<html lang="{{ $locale }}">

@include('auth.partials.head')

<body>

<div class="limiter">
	<div class="container-login100">
		@yield('content')
	</div>
</div>

{{-- SCRIPTS --}}
@include('admin.partials.scripts')

</body>

</html>
