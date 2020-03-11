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
	<link rel="shortcut icon" href="{!! asset('favicon/favicon.ico') !!}" />
	<link rel="shortcut icon" href="{!! asset('favicon/favicon.ico') !!}" type="image/x-icon" />
	<link rel="icon" href="{!! asset('favicon/favicon.ico') !!}" type="image/x-icon" />
	<link rel="icon" sizes="16x16" href="{!! asset('favicon/favicon-16.png') !!}" type="image/png" />
	<link rel="icon" sizes="32x32" href="{!! asset('favicon/favicon-32.png') !!}" type="image/jpeg" />
	{{-- <link rel="apple-touch-icon" sizes="57x57" href="{!! asset('favicon/icon-32.png') !!}" />
	<link rel="apple-touch-icon" sizes="72x72" href="{!! asset('favicon/icon-72.png') !!}" />
	<link rel="apple-touch-icon" sizes="114x114" href="{!! asset('favicon/icon-114.png') !!}" /> --}}

	{{-- Reseta CSS --}}
	{!! Html::style('css/reset.css') !!}
	{{-- CSS FRAMEWORK --}}
	{{-- {!! Html::style('vendor/bootstrap-select/css/bootstrap-select.min.css') !!} --}}
	{!! Html::style('css/admin/architect-ui.css') !!}
	{{-- CSS CUSTOM --}}
	{!! Html::style('css/custom.css') !!}
	@yield('css-custom')
</head>


{{--
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-en_US.js"></script>

--}}
