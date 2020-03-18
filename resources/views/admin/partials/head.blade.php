<head>
    <meta charset="UTF-8" />
	{{-- RESPONSIVE TAG --}}
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <title>{!! Config::get('app.name') !!}</title>

    {{-- METAS TAG --}}
	<meta name="author" content="{!! config('constants.DEVELOPER_NAME') . ' <' . config('constants.DEVELOPER_EMAIL') . '>' !!}" />
	<meta name="copyright" content="{!! config('constants.COMPANY_NAME') !!}" />
    <meta name="description" content="">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />

	{{-- ICO --}}
	<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" />
	<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon" />
	<link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon" />
	<link rel="icon" sizes="16x16" href="{!! asset('favicon-16.png') !!}" type="image/png" />
	<link rel="icon" sizes="32x32" href="{!! asset('favicon-32.png') !!}" type="image/jpeg" />
	{{-- <link rel="apple-touch-icon" sizes="57x57" href="{!! asset('icon-32.png') !!}" />
	<link rel="apple-touch-icon" sizes="72x72" href="{!! asset('icon-72.png') !!}" />
	<link rel="apple-touch-icon" sizes="114x114" href="{!! asset('icon-114.png') !!}" /> --}}

	{{-- APP --}}
	{!! Html::style('css/app.css') !!}
	{{-- ADMIN --}}
	{!! Html::style('css/admin.css') !!}


	{{-- CUSTOM --}}
	@yield('css-custom')
</head>
