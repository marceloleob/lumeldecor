
{{-- JS SYSTEM --}}
{!! Html::script('js/admin/app.js', ['defer' => 'defer']) !!}
{!! Html::script('js/admin/custom.js', ['defer' => 'defer']) !!}

{{-- JS CUSTOM INTERNAL PAGES --}}
@yield('js-custom')
