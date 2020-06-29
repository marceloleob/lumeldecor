@extends('site.layouts.pages')

@section('breadcrumb')
<li class="breadcrumb-item active">Contato</li>
@endsection

@section('content')
	{{-- START SECTION CONTACT --}}
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-md-6">
					<div class="contact_wrap contact_style3">
						<div class="contact_icon">
							<i class="linearicons-map2"></i>
						</div>
						<div class="contact_text">
							<span>Endereço</span>
							<p>
								Rua Úrsula Paulino, 911, Betânia <br />
								Belo Horizonte - MG
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="contact_wrap contact_style3">
						<div class="contact_icon">
							<i class="linearicons-envelope-open"></i>
						</div>
						<div class="contact_text">
							<span>E-mails</span>
							<p>
								contato@lumeldecor.com.br <br />
								&nbsp;
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="contact_wrap contact_style3">
						<div class="contact_icon">
							<i class="linearicons-tablet2"></i>
						</div>
						<div class="contact_text">
							<span>Telefone</span>
							<p>
								31 99514-0615 <br />
								&nbsp;
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION CONTACT --}}

	{{-- START SECTION CONTACT --}}
	<div class="section pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="heading_s1">
						<h2>Envie sua mensagem!</h2>
					</div>
					{{-- <p class="leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p> --}}
					<div class="field_form">
						<form method="post" name="enq">
							<div class="row">
								<div class="form-group col-md-12">
									{!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Digite seu nome *']) !!}
								 </div>
								<div class="form-group col-md-12">
									{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'E-mail *']) !!}
									{{-- <input required placeholder="Enter Email *" id="email" class="form-control" name="email" type="email"> --}}
								</div>
								<div class="form-group col-md-6">
									{!! Form::text('phone', old('phone'), ['class' => 'form-control phone', 'placeholder' => 'Telefone *']) !!}
									{{-- <input required placeholder="Enter Phone No. *" id="phone" class="form-control" name="phone"> --}}
								</div>
								<div class="form-group col-md-6">
									{!! Form::text('subject', old('subject'), ['class' => 'form-control', 'placeholder' => 'Assunto *']) !!}
									{{-- <input placeholder="Enter Subject" id="subject" class="form-control" name="subject"> --}}
								</div>
								<div class="form-group col-md-12">
									{{-- <textarea required placeholder="Message *" id="description" class="form-control" name="message" rows="4"></textarea> --}}
									{!! Form::textarea('message', old('message'), ['class' => 'form-control textarea', 'placeholder' => 'Seu texto *', 'rows' => '7']) !!}
								</div>
								<div class="col-md-12">
									<button type="submit" title="Submit Your Message!" class="btn btn-fill-out" id="submitButton" name="submit" value="Submit">Enviar</button>
								</div>
								<div class="col-md-12">
									<div id="alert-msg" class="alert-msg text-center"></div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
					<div class="contact_map2">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.252345659474!2d-43.98739744913582!3d-19.955887186523476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa6963441e5006d%3A0xa3ad76a813cf5c17!2sR.%20%C3%9Arsula%20Paulino%2C%20911%20-%20Cinquentenario!5e0!3m2!1sen!2sus!4v1592361172896!5m2!1sen!2sus" width="540" height="522" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION CONTACT --}}
@endsection
