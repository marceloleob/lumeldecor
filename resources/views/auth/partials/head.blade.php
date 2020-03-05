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
	<link rel="icon" href="{!! asset('favicon/favicon.ico') !!}" type="image/x-icon">
	<link rel="icon" sizes="16x16" href="{!! asset('favicon/icon-16.png') !!}" type="image/png">
	<link rel="icon" sizes="32x32" href="{!! asset('favicon/icon-32.png') !!}" type="image/jpeg">
	<link rel="apple-touch-icon" sizes="57x57" href="{!! asset('favicon/icon-32.png') !!}">
	<link rel="apple-touch-icon" sizes="72x72" href="{!! asset('favicon/icon-72.png') !!}">
	<link rel="apple-touch-icon" sizes="114x114" href="{!! asset('favicon/icon-114.png') !!}">
	<link rel="shortcut icon" href="{!! asset('favicon/favicon.ico') !!}" type="image/x-icon">
	<link rel="shortcut icon" href="{!! asset('favicon/favicon.ico') !!}">

	{{-- Reseta CSS --}}
	{!! Html::style('css/reset.css') !!}
	{{-- CSS LIBS --}}
	{!! Html::style('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') !!}
	{{-- CSS FRAMEWORK --}}
{{-- CSS FRAMEWORK --}}
	{!! Html::style('css/admin/sb-admin-2.css') !!}
	{!! Html::style('css/auth/util.css') !!}
	{!! Html::style('css/auth/main.css') !!}
	{{-- CSS CUSTOM --}}
	{!! Html::style('css/custom.css') !!}

</head>
