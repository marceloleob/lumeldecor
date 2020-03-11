
{{-- VENDOR / JQUERY --}}
{!! Html::script('vendor/jquery/jquery.min.js', ['defer' => 'defer']) !!}
{{-- VENDOR / SELECTPICKER --}}
{!! Html::script('vendor/bootstrap-select/js/bootstrap-select.min.js', ['defer' => 'defer']) !!}
{!! Html::script('vendor/bootstrap-select/js/i18n/defaults-' . $locale . '.min.js', ['defer' => 'defer']) !!}
{{-- JS TEMPLATE --}}
{!! Html::script('js/admin/architect-ui.js', ['defer' => 'defer']) !!}
{{-- JS CUSTOM INTERNAL PAGES --}}
@yield('js-custom')
{{-- JS CUSTOM SYSTEM --}}
{!! Html::script('js/admin/custom.js', ['defer' => 'defer']) !!}
