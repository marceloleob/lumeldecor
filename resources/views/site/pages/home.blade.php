@extends('site.layouts.home')

@section('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

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

@stop
