
{{-- JS LIBS / JQUERY --}}
{!! Html::script('vendor/jquery/jquery.min.js', ['defer' => 'defer']) !!}
{{-- JS LIBS / BOOTSTRAP --}}
{!! Html::script('vendor/bootstrap/js/bootstrap.bundle.min.js', ['defer' => 'defer']) !!}
{!! Html::script('vendor/bootstrap-select/js/bootstrap-select.min.js', ['defer' => 'defer']) !!}
{{-- JS TEMPLATE --}}
{!! Html::script('js/admin/architect-ui.js', ['defer' => 'defer']) !!}
{{-- JS CUSTOM --}}
{!! Html::script('js/admin/scripts.js', ['defer' => 'defer']) !!}
@yield('js-custom')
