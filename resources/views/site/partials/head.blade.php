{{-- GOOGLE ANALYTICS --}}
@include('site.partials.analytics')

<meta charset="utf-8" />
{{-- RESPONSIVE TAG --}}
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>{!! Config::get('app.name') !!}</title>

{{-- METAS TAG --}}
<meta name="author" content="{!! config('constants.DEVELOPER_NAME') . ' <' . config('constants.DEVELOPER_EMAIL') . '>' !!}" />
<meta name="copyright" content="{!! config('constants.COMPANY_NAME') !!}" />
<meta name="keywords" content="decoracao, festas, artigos para festas, BH decoracao, MG decoracao, BH decoracoes, festas BH, festas criativas, artigos para festas, decoracao de festas, decor moderna, festa de luxo, festa em casa, loja de festas, festa infantil" />
<meta name="description" content="Somos uma loja especializada em vendas de artigos para festas e decorações. Aqui você encontrará tudo que precisa para decorar seu ambiente, desde cerâmica, louças, MDF, luminárias, personagens e vários outros itens para decoração." />
<meta name="csrf-token" content="{!! csrf_token() !!}" />
<meta name="robots" content="index, follow" />
{{-- ICO --}}
<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" />
{{-- <link rel="shortcut icon" type="image/x-icon" href="{!! Html::style('assets/images/favicon.png') !!} --}}



<!-- Animation CSS -->
{!! Html::style('assets/css/animate.css') !!}
<!-- Latest Bootstrap min CSS -->
{!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
<!-- Icon Font CSS -->
{{-- {!! Html::style('assets/css/all.min.css') !!} --}}
{!! Html::style('css/app.css') !!}
{!! Html::style('assets/css/ionicons.min.css') !!}
{!! Html::style('assets/css/themify-icons.css') !!}
{!! Html::style('assets/css/linearicons.css') !!}
{!! Html::style('assets/css/flaticon.css') !!}
{!! Html::style('assets/css/simple-line-icons.css') !!}
<!--- owl carousel CSS-->
{!! Html::style('assets/owlcarousel/css/owl.carousel.min.css') !!}
{!! Html::style('assets/owlcarousel/css/owl.theme.default.css') !!}
{!! Html::style('assets/owlcarousel/css/owl.theme.default.min.css') !!}
<!-- Magnific Popup CSS -->
{!! Html::style('assets/css/magnific-popup.css') !!}
<!-- Slick CSS -->
{!! Html::style('assets/css/slick.css') !!}
{!! Html::style('assets/css/slick-theme.css') !!}
<!-- Style CSS -->
{!! Html::style('assets/css/style.css') !!}
{!! Html::style('assets/css/responsive.css') !!}
