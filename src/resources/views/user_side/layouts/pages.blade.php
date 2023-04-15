@extends('user_side.layouts.master')

@section('layout')
    @include('user_side.partials.stripe-nav')

    <main class="overflow-hidden {{ $mainClass ?? '' }}">
        @yield('content')
        @yield('footer')
    </main>
@endsection
