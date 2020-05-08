
{{-- JS SYSTEM --}}
{!! Html::script('js/admin/app.js', ['defer' => 'defer']) !!}
{!! Html::script('js/admin/architect-ui.min.js', ['defer' => 'defer']) !!}

{{-- JS CUSTOM INTERNAL PAGES --}}
@yield('js-custom')
