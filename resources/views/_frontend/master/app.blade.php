<!DOCTYPE html>
<html lang="en">
@include('_frontend.master.partials.htmlheader')
<body class="front_page" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    @yield('message')
    @include('_frontend.master.partials.nav_bar')
    @yield('content')
    @include('_frontend.master.partials.footer')
    @include('_frontend.master.partials.footer_b')
    @include('_frontend.master.partials.scripts')
    @stack('scripts')
</body>
</html>
