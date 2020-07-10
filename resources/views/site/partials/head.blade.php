{{-- GOOGLE ANALYTICS --}}
@include('site.partials.analytics')

<meta charset="utf-8" />
{{-- RESPONSIVE TAG --}}
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>{!! Config::get('app.name') !!} {!! (!empty($title)) ? ' - ' . implode(' - ', $title) : '' !!}</title>

{{-- METAS TAG --}}
<meta name="author" content="{!! config('constants.DEVELOPER.NAME') . ' <' . config('constants.DEVELOPER.EMAIL') . '>' !!}" />
<meta name="copyright" content="{!! config('constants.COMPANY.NAME') !!}" />
<meta name="keywords" content="decoracao, festas, artigos para festas, BH decoracao, MG decoracao, BH decoracoes, festas BH, festas criativas, artigos para festas, decoracao de festas, decor moderna, festa de luxo, festa em casa, loja de festas, festa infantil" />
<meta name="description" content="Somos uma loja especializada em vendas de artigos para festas e decorações. Aqui você encontrará tudo que precisa para decorar seu ambiente, desde cerâmica, louças, MDF, luminárias, personagens e vários outros itens para decoração." />
<meta name="csrf-token" content="{!! csrf_token() !!}" />
<meta name="robots" content="index, follow" />
{{-- Open Graph tags of Facebook --}}
@yield('facebook')

{{-- ICO --}}
<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" />
{{-- <link rel="shortcut icon" type="image/x-icon" href="{!! asset('images/favicon/favicon.png') !!} --}}

{{-- GOOGLE FONTS --}}
{!! Html::style('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap') !!}
{{-- APIS STYLE --}}
{!! Html::style('css/app.css') !!}
{{-- ICON FONT CSS --}}
{!! Html::style('css/icons.css') !!}
{{-- ANIMATION CSS --}}
{!! Html::style('css/site/animate.css') !!}
{{-- APIS STYLE --}}
{!! Html::style('css/site/app.css') !!}
{!! Html::style('css/site/style.css') !!}
{!! Html::style('css/site/responsive.css') !!}
