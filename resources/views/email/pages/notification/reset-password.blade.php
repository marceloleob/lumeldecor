@extends('email.layouts.main')

@section('content')

	<table cellpadding="0" cellspacing="0" width="100%" role="presentation">
		<tr>
			<td>
				<h2>Olá!</h2>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
				<p>Recebemos uma solicitação de redefinição de senha para sua conta.</p>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td class="align-center">
				<a href="{!! $link !!}" class="btn bg-maroon">Clique aqui para redefinir sua senha</a>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
                <p>Este link de redefinição de senha vai expira em {!! $count !!} minutos.</p>
                <p>Se você não solicitou uma redefinição de senha, não há necessidade de clicar no botão.</p>
            </td>
		</tr>
	</table>

@stop
