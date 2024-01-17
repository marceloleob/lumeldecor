@extends('admin.layouts.app')

@section('js-custom')
    {{-- JS VALIDATION / MASKS --}}
    <script src="js/forms/jquery.validate.{{ $locale }}.js"></script>
    <script src="js/forms/jquery.masks.{{ $locale }}.js"></script>
    <script src="js/forms/app.js"></script>
    {{-- JS CUSTOM INTERNAL PAGES --}}
    <script src="js/admin/pages.js"></script>
@stop

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="@yield('icon') icon-gradient bg-plum-plate"></i>
                </div>
                <div>
                    @yield('title')
                    <div class="page-title-subheading">@yield('subheading')</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="@yield('btn-back')" class="mb-2 mr-2 btn-icon btn-shadow btn btn-outline-focus">
                        <span class="btn-icon-wrapper pr-2 opacity-9"><i class="fas fa-arrow-circle-left fa-w-20"></i></span>
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::boxNotification($errors) !!}
        </div>
    </div>

    @yield('form')

@endsection
