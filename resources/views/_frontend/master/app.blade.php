<!DOCTYPE html>
<html lang="en">

@include('_frontend.master.partials.htmlheader')

<body class="container-fluid frontPage" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        @yield('message')
        {{-- @include('_frontend.master.partials.header') --}}
        @include('_frontend.master.partials.nav_bar')
        <div class="main">
            {{-- @include('_frontend.master.partials.carousel') --}}
            {{-- @include('_frontend.master.partials.custom_slide_show') --}}
            {{-- <div id="simplegallery1" class="simplegallery"></div> --}}
            {{-- @include('_frontend.master.partials.animated_image') --}}
            <!--------------------------------------------------------------------------------------->

            @yield('content')

            {{-- @include('_frontend.master.partials.mapscript') --}}

            @include('_frontend.master.partials.footer')
            @include('_frontend.master.partials.footer_b')

        </div>

        @include('_frontend.master.partials.scripts')

        @stack('scripts')


</body>
</html>
