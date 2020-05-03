
{{-- JS SYSTEM --}}
{!! Html::script('js/app.js', ['defer' => 'defer']) !!}
{!! Html::script('js/admin.js', ['defer' => 'defer']) !!}

{{-- JS TEMPLATE --}}
{{-- {!! Html::script('js/canvasjs.min.js', ['defer' => 'defer']) !!} --}}

{{-- JS CUSTOM INTERNAL PAGES --}}
@yield('js-custom')
