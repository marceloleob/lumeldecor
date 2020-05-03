<!DOCTYPE html>
<html lang="{{ $locale }}">

<head>
	<meta charset="UTF-8" />
	{{-- RESPONSIVE TAG --}}
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html" />

	{{-- CSS --}}
	@include('email.partials.style')
</head>

<body class="">
	<span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>

	<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
		<tr>
			<td height="25" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="75" class="bgcolor">&nbsp;</td>
			<td class="bgcolor">
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
					<tr>
						<td class="bgcolor">&nbsp;</td>
						<td align="center" width="200">
							<a href="{!! route('home') !!}" target="_blank">
								<img src="{!! asset('style/images/logo.png') !!}" class="logo"
									alt="{!! Config::get('app.name') !!}" title="{!! Config::get('app.name') !!}">
							</a>
						</td>
						<td class="bgcolor">&nbsp;</td>
					</tr>
				</table>
			</td>
			<td height="75" class="bgcolor">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class="container">

				{{-- START CENTERED WHITE CONTAINER --}}
				<div class="content">
					<table role="presentation" class="main">
						<tr>
							<td class="wrapper">
								@yield('content')
							</td>
						</tr>
					</table>
				</div>
				{{-- END CENTERED WHITE CONTAINER --}}

				{{-- START FOOTER --}}
				<div class="footer">
					<table role="presentation" border="0" cellpadding="0" cellspacing="0">
						{{-- <tr>
							<td class="content-block">
								<span class="apple-link">Company Inc, 3 Abbey Road, San Francisco CA 94102</span>
								<br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>.
							</td>
						</tr> --}}
						<tr>
							<td class="content-block powered-by">
								&copy; {!! date('Y') !!} <a href="{!! route('home') !!}" target="_blank">Turn UP
									Web</a>. {!! trans('pages/footer.rights') !!}.
							</td>
						</tr>
					</table>
				</div>
				{{-- END FOOTER --}}

			</td>
			<td>&nbsp;</td>
		</tr>
	</table>

</body>

</html>
