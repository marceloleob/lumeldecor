<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', strtolower(App::getLocale())) }}">

@include('admin.partials.head')

<body>

<div id="page_wrapper" class="container-fluid">
    <div class="row">
        {{-- HEADER --}}
        @include('admin.partials.header')

        <section class="full_row bg_gray header_margin">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt_md_50">
                            {{-- CONTENT --}}
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FOOTER --}}
        @include('admin.partials.footer')
    </div>
</div>

{{-- SCRIPTS --}}
@include('admin.partials.scripts')

</body>
</html>
