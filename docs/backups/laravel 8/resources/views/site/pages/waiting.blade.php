<!DOCTYPE html>
<html lang="{!! $locale !!}">

<head>
	{{-- GOOGLE ANALYTICS --}}
	@include('site.partials.analytics')

	<meta charset="utf-8" />
	{{-- RESPONSIVE TAG --}}
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name') }}</title>

	{{-- METAS TAG --}}
	<meta name="keywords" content="decoracao, festas, artigos para festas, BH decoracao, MG decoracao, BH decoracoes, festas BH, festas criativas, artigos para festas, decoracao de festas, decor moderna, festa de luxo, festa em casa, loja de festas, festa infantil" />
	<meta name="description" content="Somos uma loja especializada em vendas de artigos para festas e decorações. Aqui você encontrará tudo que precisa para decorar seu ambiente, desde cerâmica, louças, MDF, luminárias, personagens e vários outros itens para decoração." />
	<meta name="author" content="{!! config('constants.DEVELOPER.NAME') . ' <' . config('constants.DEVELOPER.EMAIL') . '>' !!}" />
	<meta name="copyright" content="{!! config('constants.COMPANY.NAME') !!}" />
	<meta name="csrf-token" content="{!! csrf_token() !!}" />
	<meta name="robots" content="index, follow" />
	{{-- ICO --}}
	<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" />
	{{-- FONTS --}}
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	{{-- CSS --}}
	{!! Html::style('css/app.css') !!}
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

		.links {
			color: #636b6f;
			padding: 0 25px;
			font-size: 13px;
			font-weight: 600;
			letter-spacing: .1rem;
			text-decoration: none;
			text-transform: uppercase;
		}

		.social {
			display: inline-block;
			width: 25%;
		}

		.social ul {
			display: flex;
			align-items: center;
			justify-content: space-between;
			list-style-type: none;
			text-decoration: none;
			padding: 35px 0 150px 0;
		}

		.fab {
			font-size: 35px;
		}
		.fa-whatsapp {
			color: rgb(37, 211, 102);
		}
		.fa-facebook {
			color: rgb(59, 91, 152);
		}
		.fa-instagram {
			color: rgb(225,48,108);
		}

		a {
			color: #636b6f;
			font-size: 13px;
			font-weight: 600;
			letter-spacing: .1rem;
			text-transform: uppercase;
		}
		a:link {
			text-decoration: none;
		}
		a:hover {
			font-weight: 900;
		}

		.m-b-md {
			margin-bottom: 30px;
		}
	</style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('dashboard') }}">Home</a>
                @else
                    {{-- <a href="{{ route('login') }}">Login</a> --}}

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="links">
                EM BREVE
            </div>

            <div class="title m-b-md">
                {{ config('app.name') }}
            </div>

            <div class="social">
				<ul class="social-color">
					<li><a href="https://wa.me/553195140615" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
					<li><a href="https://www.facebook.com/lumelldecor" target="_blank"><i class="fab fa-facebook"></i></a></li>
					<li><a href="https://www.instagram.com/lumeldecor" target="_blank"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div>

			<div class="app-footer">
				<div class="app-footer-center">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-sm-12 py-1">
								<span class="text-center d-block"><i class="far fa-copyright"></i> Copyright {!! date('Y') !!} - <span class="company">{!! Config::get('app.name') !!}</span> - Todos os direitos reservados</span>
							</div>
							<div class="col-lg-12 col-sm-12 py-1">
								<span class="text-center d-block">Site criado por <a href="https://www.turnupweb.com" class="turnupweb" target="_blank">TurnUP Web</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>

</body>
</html>
