
{{-- modernizr js --}}
{!! Html::script('js/modernizr-custom.js') !!}
{{-- JS SYSTEM --}}
{!! Html::script('js/site/app.js', ['defer' => 'defer']) !!}
{{-- JS VALIDATION / MASKS --}}
{!! Html::script('js/forms/jquery.validate.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/jquery.masks.' . $locale . '.js', ['defer' => 'defer']) !!}
{!! Html::script('js/forms/app.js', ['defer' => 'defer']) !!}
{{-- JS CUSTOM INTERNAL PAGES --}}
{!! Html::script('js/site/pages.js', ['defer' => 'defer']) !!}
