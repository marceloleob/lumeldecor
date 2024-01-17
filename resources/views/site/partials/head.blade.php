{{-- GOOGLE ANALYTICS --}}
@include('site.partials.analytics')

<meta charset="utf-8" />
{{-- RESPONSIVE TAG --}}
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Language" content="{{ $locale }}" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>{!! Config::get('app.name') !!} {!! (!empty($title)) ? ' - ' . implode(' - ', $title) : '' !!}</title>

{{-- METAS TAG --}}
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<meta name="author" content="{!! config('constants.DEVELOPER.NAME') . ' <' . config('constants.DEVELOPER.EMAIL') . '>' !!}" />
<meta name="copyright" content="{!! config('constants.COMPANY.NAME') !!}" />
<meta name="keywords" content="decoracao, festas, artigos para festas, BH decoracao, MG decoracao, BH decoracoes, festas BH, festas criativas, artigos para festas, decoracao de festas, decor moderna, festa de luxo, festa em casa, loja de festas, festa infantil" />
<meta name="description" content="Somos uma loja especializada em vendas de artigos para festas e decorações. Aqui você encontrará tudo que precisa para decorar seu ambiente, desde cerâmica, louças, MDF, luminárias, personagens e vários outros itens para decoração." />
<meta name="csrf-token" content="{!! csrf_token() !!}" />
<meta name="robots" content="index, follow" />
{{-- Open Graph tags of Facebook --}}
@yield('facebook')

{{-- ICO --}}
<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon" />
<link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon" />

{{-- APIS STYLE --}}
@vite([
    'resources/assets/sass/app.scss',
    'resources/assets/sass/site/app.scss',
    'resources/assets/js/app.js'
])
