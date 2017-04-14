<!DOCTYPE html>
<html>
@include('_backend.master.partials.htmlheader')
<body class="sagmma-skin sidebar-mini">
    <div class="wrapper">
        @include('_backend.master.partials.mainheader')
        @include('_backend.master.partials.sidebar')
        <div class="content-wrapper">
            @include('_backend.master.partials.contentheader')
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    @include('flash::message')
                </div>
            </div>
            <section class="content">
                @yield('main-content')
            </section>
        </div>
        @include('_backend.master.partials.controlsidebar')
        @include('_backend.master.partials.footer')
    </div>
    @include('_backend.master.partials.scripts')
    @stack('scripts')
    <script type="text/javascript">
    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
    });

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 6000);
    
    </script>
</body>
</html>
