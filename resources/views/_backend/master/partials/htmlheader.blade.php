<head>
    <meta charset="UTF-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <title> Sagmma Admin - @yield('htmlheader_title', 'Titolo aqui') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css" media="screen" title="no title"/>

    <link href="/bower_components/Ionicons/css/ionicons.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/css/_all-skins.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/back/back.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{-- @yield('style-header') --}}
    @yield('sagmma-style')
</head>
