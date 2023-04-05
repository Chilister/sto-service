<!DOCTYPE html>
<html lang="en">
<head>
    @include('user_side.partials.head')
    @yield('head')
</head>
<body id="bg">
<div id="loading-area" class="loading-02"></div>
<div class="page-wraper">
    @include('user_side.partials.header')
    <!-- Header End -->
    @yield('content')
    <!-- Footer -->
    @include('user_side.partials.footer')
    <!-- Footer End -->
    <button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
@include('user_side.partials.scripts')
@yield('scripts')
</body>
</html>
