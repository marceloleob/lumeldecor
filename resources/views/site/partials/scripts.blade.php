
{{-- modernizr js --}}
{!! Html::script('js/libs/modernizr-custom.js') !!}
{{-- JS SYSTEM --}}
{!! Html::script('js/site/app.js', ['defer' => 'defer']) !!}
{{-- JS VALIDATION / MASKS --}}
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/site/pages.js', ['defer' => 'defer']) !!}
{{-- JS CUSTOM INTERNAL PAGES --}}
@yield('js-custom')

