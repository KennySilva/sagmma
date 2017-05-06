<head>
    <!--------------------------------------------------------------------------------------------------------->
    <meta charset="UTF-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--------------------------------------------------------------------------------------------------------->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/font-awesome-animation/dist/font-awesome-animation.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/Ionicons/css/ionicons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/_all-skins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/back/back.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/select2-bootstrap-theme/dist/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/jquery-confirm2/css/jquery-confirm.css') }}" rel="stylesheet" type="text/css"/>
    <!--------------------------------------------------------------------------------------------------------->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{-- @yield('style-header') --}}
    @yield('sagmma-style')
    <script src="{{ asset('https://www.google.com/recaptcha/api.js') }}"></script>
    <!--------------------------------------------------------------------------------------------------------->
    {{-- Google analitics --}}
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-93883129-1', 'auto');
    ga('send', 'pageview');
    </script>
    <!--------------------------------------------------------------------------------------------------------->
    <title> Sagmma Admin - @yield('htmlheader_title', 'SAGMMA') </title>
    <!--------------------------------------------------------------------------------------------------------->
</head>
