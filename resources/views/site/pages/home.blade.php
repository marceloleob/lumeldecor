@extends('site.layouts.home')

@section('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="links">
                EM BREVE
            </div>

            <div class="title m-b-md">
                {{ config('app.name') }}
            </div>

            <div class="links">
                <a href="https://turnupweb.com" target="_blank">TurnUp Web</a>
            </div>
        </div>
    </div>

@stop
