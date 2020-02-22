
{{-- JS LIBS / JQUERY --}}
{!! Html::script('assets/admin/js/libs/jquery.min.js', ['defer' => 'defer']) !!}

{{-- JS LIBS / BOOTSTRAP --}}
{!! Html::script('assets/admin/js/libs/bootstrap.min.js', ['defer' => 'defer']) !!}
{!! Html::script('assets/admin/js/libs/bootstrap-select.min.js', ['defer' => 'defer']) !!}

{{-- JS SCRIPTS --}}
{!! Html::script('assets/admin/js/script.js', ['defer' => 'defer']) !!}

{{-- JS CUSTOM --}}
@yield('js-custom')
