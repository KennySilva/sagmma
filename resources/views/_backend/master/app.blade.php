<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('_backend.master.partials.htmlheader')

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="sagmma-skin sidebar-mini">
    <div class="wrapper">

        @include('_backend.master.partials.mainheader')

        @include('_backend.master.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @include('_backend.master.partials.contentheader')

            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('main-content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        @include('_backend.master.partials.controlsidebar')

        @include('_backend.master.partials.footer')

    </div><!-- ./wrapper -->

    @include('_backend.master.partials.scripts')
    @stack('scripts')
    <script type="text/javascript">
    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
    });
    </script>
</body>
</html>
