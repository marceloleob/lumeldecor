<head>
    {{-- GOOGLE ANALYTICS --}}
    @include('site.partials.analytics')

    <meta charset="utf-8" />
    {{-- RESPONSIVE TAG --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name') }}</title>

    {{-- METAS TAG --}}
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="{!! config('constants.DEVELOPER_NAME') . ' <' . config('constants.DEVELOPER_EMAIL') . '>' !!}" />
	<meta name="copyright" content="{!! config('constants.COMPANY_NAME') !!}" />
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <meta name="robots" content="index, follow" />
    {{-- ICO --}}
    <link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" />
    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    {{-- STYLE --}}
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            text-transform: uppercase;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>