<head>
    <meta charset="UTF-8" />
	{{-- RESPONSIVE TAG --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>{!! Config::get('app.name') !!}</title>

    {{-- METAS TAG --}}
	<meta name="author" content="{!! config('constants.DEVELOPER_NAME') . ' <' . config('constants.DEVELOPER_EMAIL') . '>' !!}" />
	<meta name="copyright" content="{!! config('constants.COMPANY_NAME') !!}" />
    <meta name="csrf-token" content="{!! csrf_token() !!}" />

	{{-- ICO --}}
	<link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon">
	<link rel="icon" sizes="16x16" href="{!! asset('favicon-16.png') !!}" type="image/png">
	<link rel="icon" sizes="32x32" href="{!! asset('favicon-32.png') !!}" type="image/jpeg">

	<link rel="apple-touch-icon" sizes="57x57" href="{!! asset('favicon-32.png') !!}">
	<link rel="apple-touch-icon" sizes="72x72" href="{!! asset('favicon-72.png') !!}">
	<link rel="apple-touch-icon" sizes="114x114" href="{!! asset('favicon-114.png') !!}">

	<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon">
	<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}">

	{{-- Reseta CSS --}}
	{!! Html::style('admin/css/reset.css') !!}

	{{-- CSS LIBS --}}
	{!! Html::style('admin/css/libs/bootstrap-4.1.3.min.css') !!}
	{!! Html::style('admin/css/libs/bootstrap-select.min.css') !!}
	{!! Html::style('admin/css/libs/fontawesome-all-5.5.0.min.css') !!}

	{{-- CSS CUSTOM --}}
	{!! Html::style('admin/css/style.css') !!}

	{{-- CSS LIBS --}}
    {!! Html::style('admin/css/color/lilac.css') !!}

</head>
