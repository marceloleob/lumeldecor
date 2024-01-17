
<meta charset="UTF-8" />
{{-- RESPONSIVE TAG --}}
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Language" content="{{ $locale }}" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>{!! Config::get('app.name') !!}</title>

{{-- METAS TAG --}}
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<meta name="author" content="{!! config('constants.DEVELOPER.NAME') . ' <' . config('constants.DEVELOPER.EMAIL') . '>' !!}" />
<meta name="copyright" content="{!! config('constants.COMPANY.NAME') !!}" />
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="csrf-token" content="{!! csrf_token() !!}" />
<meta name="robots" content="noindex" />

{{-- ICO --}}
<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" />
<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon" />
<link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon" />

{{-- CSS --}}
<link media="all" type="text/css" rel="stylesheet" href="css/app.css">
<link media="all" type="text/css" rel="stylesheet" href="css/admin/architect-ui.min.css">
<link media="all" type="text/css" rel="stylesheet" href="css/admin/app.css">

{{-- CUSTOM --}}
@yield('css-custom')
