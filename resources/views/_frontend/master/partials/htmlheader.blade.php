<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title> Mercado Municipal de Achada Riba - @yield('htmlheader_title', 'SAGMMA') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css" media="screen" title="no title"/>
    <link href="{{ asset('/bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/select2-bootstrap-theme/dist/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/bower_components/font-awesome-animation/dist/font-awesome-animation.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <link rel="stylesheet" href="css/front/front.css" media="screen" title="no title">
    <link rel="stylesheet" href="css/front/front_end.css" media="screen" title="no title">

    <link rel="stylesheet" href="/bower_components/flexisel/css/style.css">

    <link rel="stylesheet" href="/bower_components/lightbox2/dist/css/lightbox.css">




    {{-- <script src="/bower_components/jquery/dist/jquery.js"></script> --}}

    {{-- ---------------------------------------------------------------------------------------------------- --}}
    <link rel="stylesheet" href="css/aux/simplegallery.css" />


    <style media="screen">
    .simplegallery .gallerydesc .gallerydesctext{
        width: auto;
        color: #00ff00;
        text-align: left;
        padding: 5px; /* padding inside description panel */
    }
    </style>
    {{-- ----------------------------------------------------------------------------------------- --}}

    {{-- <script src="/bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/bower_components/flexisel/js/jquery.flexisel.js"></script> --}}
    @yield('front-style')
</head>
