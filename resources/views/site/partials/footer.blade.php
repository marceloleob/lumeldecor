<div class="footer_top pt_50 pb_10 bg_lumel_gray">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="widget">
					<div class="footer_logo text-center">
						<a href="{!! route('home') !!}"><img src="{!! asset('images/logo_light_big.png') !!}" alt="logo"/></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="widget">
					<h6 class="widget_title">Informações</h6>
					<ul class="contact_info">
						<li>
							<i class="ti-location-pin"></i>
							<p>Rua Úrsula Paulino, 911, Betânia</p>
							<p class="contact_p_4">Belo Horizonte - MG</p>
						</li>
						<li>
							<i class="ti-email"></i>
							<p>contato@lumeldecor.com.br</p>
							<p class="contact_p_4">financeiro@lumeldecor.com.br</p>
						</li>
						<li>
							<i class="ti-mobile"></i>
							<p>31 99514-0615</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-3">
				<div class="widget">
					<h6 class="widget_title">Links Úteis</h6>
					<ul class="widget_links">
						<li><a href="{!! route('about') !!}">Sobre Nós</a></li>
						<li><a href="{!! route('faq') !!}">Perguntas Frequentes</a></li>
						<li><a href="{!! route('terms') !!}">Termos de Uso</a></li>
						<li><a href="{!! route('contact') !!}">Contato</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-3">
				<div class="widget">
					<h6 class="widget_title">Minha Conta</h6>
					<ul class="widget_links">
						<li><a href="#">Meus Dados</a></li>
						<li><a href="#">Descontos</a></li>
						<li><a href="#">Devoluções</a></li>
						<li><a href="#">Histórico de Compras</a></li>
						<li><a href="#">Rastreamentos</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bottom_footer border-top-tran pt_30 bg_lumel_gray">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5">
				<p class="mb-lg-0 text-truncate">
					<i class="far fa-registered"></i> {!! date('Y') !!} - <span class="company">{!! Config::get('app.name') !!}</span> - Todos os direitos reservados
				</p>
			</div>
			<div class="col-lg-4 order-lg-first">
				<div class="widget mb-lg-0">
					<ul class="social_icons footer text-center">
						<li><a href="https://www.facebook.com/lumelldecor" target="_blank"><img src="{!! asset('images/icons/social_facebook.png') !!}"></a></li>
						<li><a href="https://www.instagram.com/lumeldecor" target="_blank"><img src="{!! asset('images/icons/social_instagram.png') !!}"></a></li>
						<li><a href="https://wa.me/553195140615" target="_blank"><img src="{!! asset('images/icons/social_whatsapp.png') !!}"></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<ul class="footer_payment text-center text-lg-right">
					<li><a href="#"><img src="{!! asset('images/icons/payment_visa.png') !!}" alt="visa"></a></li>
					<li><a href="#"><img src="{!! asset('images/icons/payment_master_card.png') !!}" alt="master_card"></a></li>
					<li><a href="#"><img src="{!! asset('images/icons/payment_paypal.png') !!}" alt="paypal"></a></li>
					<li><a href="#"><img src="{!! asset('images/icons/payment_amarican_express.png') !!}" alt="amarican_express"></a></li>
				</ul>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-12 col-sm-12 py-3">
				<p class="mb-lg-0 text-center">
					Site criado por &nbsp; <i class="far fa-registered"></i> <a href="https://www.turnupweb.com" class="turnupweb" target="_blank">TurUp Web</a> &nbsp; <img src="{!! asset('images/icons/turnupweb.png') !!}" />
				</p>
			</div>
		</div>
	</div>
</div>
