<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title> Mercado Municipal de Achada Riba - @yield('htmlheader_title', 'SAGMMA') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css" media="screen" title="no title"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <link rel="stylesheet" href="css/front/front.css" media="screen" title="no title">

    <link rel="stylesheet" href="/bower_components/flexisel/css/style.css">


    <link rel="stylesheet" href="/bower_components/lightbox2/dist/css/lightbox.css">    



    <script src="/bower_components/jquery/dist/jquery.js"></script>

    {{-- ---------------------------------------------------------------------------------------------------- --}}
    <link rel="stylesheet" href="css/aux/simplegallery.css" />
    <script src="aux/js/touch_swipe/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="aux/js/simplegallery.js"></script>


    <script type="text/javascript">
    var mygallery=new simpleGallery({
        wrapperid: "simplegallery1", //ID of main gallery container,
        dimensions: ['100%', 400], //width/height of gallery in [pixels, pixels] or ['percentage%', pixels]
        imagearray: [
            ["http://lorempixel.com/400/400/", "http://en.wikipedia.org/wiki/Swimming_pool", "_new", "Este é uma imagfem ki vai revolucionar a coisa certo"],
            ["http://lorempixel.com/400/400/", "http://en.wikipedia.org/wiki/Cave", "", "Estou a caminho de revolucionar o sistema"],
            ["http://lorempixel.com/400/400/", "", "", "Este é a coisa mais importante da minha vida"],
            ["http://lorempixel.com/400/400/", "", "", "Não quero viver so para viver mas quero comtribuir para a milhoria do sistema"]
        ],
        autoplay: [true, 1000, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
        persist: false,
        scaleimage: 'both', //valid values are 'both', 'width', or 'none'
        fadeduration: 1500, //transition duration (milliseconds)
        preloadfirst:false,
        oninit:function(){ //event that fires when gallery has initialized/ ready to run
        },
        onslide:function(curslide, i){ //event that fires after each slide is shown
            //curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
            //i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
        }
    })
    </script>

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
