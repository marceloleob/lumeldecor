
{{-- modernizr js --}}
{!! Html::script('js/libs/modernizr-custom.js') !!}
{{-- JS SYSTEM --}}
{!! Html::script('js/admin/app.js', ['defer' => 'defer']) !!}
{{-- JS CUSTOM INTERNAL PAGES --}}
@yield('js-custom')
