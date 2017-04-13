<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .hero-unit {margin: 10px;}
    .slidemargin {margin: 10px;
    }
    .blank {max-height: 250px}
    @media (max-width: 979px) and (min-width: 768px) {
    }
    @media (max-width: 767px) {
        .hero-unit {padding: 30px;}
        .hero-unit h1 { font-size: 48px}
        .hero-unit {margin-bottom: 0px;}
        .slidemargin {margin: 5px;}
    }
    @media (max-width:767) and (min-width:600px) {

    }
    @media (max-width:599px) {

    }
    /*======= Bootstrap Prettify CSS ========= */
    .com { color: #93a1a1; }
    .lit { color: #195f91; }
    .pun, .opn, .clo { color: #93a1a1; }
    .fun { color: #dc322f; }
    .str, .atv { color: #D14; }
    .kwd, .prettyprint .tag { color: #1e347b; }
    .typ, .atn, .dec, .var { color: teal; }
    .pln { color: #48484c; }

    .prettyprint {
        padding: 8px;
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
    }
    .prettyprint.linenums {
        -webkit-box-shadow: inset 40px 0 0 #fbfbfc, inset 41px 0 0 #ececf0;
        -moz-box-shadow: inset 40px 0 0 #fbfbfc, inset 41px 0 0 #ececf0;
        box-shadow: inset 40px 0 0 #fbfbfc, inset 41px 0 0 #ececf0;
    }

    /* Specify class=linenums on a pre to get line numbering */
    ol.linenums {
        margin: 0 0 0 33px; /* IE indents via margin-left */
    }
    ol.linenums li {
        padding-left: 12px;
        color: #bebec5;
        line-height: 20px;
        text-shadow: 0 1px 0 #fff;

    }
    /*======= Slideshow ========= */
    .slidecontainer {
        position: relative;
        z-index: 2;
        left: 0;
        top: 0;
    }
    .fullwidth {
        width: 100%;
    }
    </style>

    <script type="text/javascript">
    $(document).ready(function() {
        //JQuery Cycle code
        $('#slideshow').after('<ul id="pager">').cycle({
            fx:     'fade',
            //prev: '#prev',
            //next: '#next',
            //pager:  '#pager',
            containerResize: 0,
            width: '100%',
            fit: 1,
            pagerAnchorBuilder: function(idx, el) {
                return '<li><a href="cpage_7#"></a></li>';
            }
        });

        //This resizes the blank image in the resize example
        //initglitch fix
        var initfix = 18;

        ///on resize, set blank image height
        function imageresize() {
            $(".slidecontainer").each(function () {
                var imgHeight = $(this).find(".slide1").height();
                $(this).find(".blankimg").css("height", imgHeight+initfix);
            });
        };
        $(window).bind("resize", function(){
            //clears the initfix
            initfix = 0;
            imageresize();
        });
        imageresize();
    });

    //Additional Inits for demos of slide show

    $(document).ready(function() {
        $('#slideshow2').after('<ul id="pager2">').cycle({
            fx:     'fade',
            //prev: '#prev',
            //next: '#next',
            //pager:  '#pager',
            containerResize: 0,
            width: '100%',
            fit: 1,
            pagerAnchorBuilder: function(idx, el) {
                return '<li><a href="cpage_7#"></a></li>';
            }
        });
        $('#slideshow3').after('<ul id="pager3">').cycle({
            fx:     'fade',
            //prev: '#prev',
            //next: '#next',
            //pager:  '#pager',
            containerResize: 0,
            width: '100%',
            fit: 1,
            pagerAnchorBuilder: function(idx, el) {
                return '<li><a href="cpage_7#"></a></li>';
            }
        });
        $('#slideshow4').after('<ul id="pager3">').cycle({
            fx:     'fade',
            //prev: '#prev',
            //next: '#next',
            //pager:  '#pager',
            containerResize: 0,
            width: '100%',
            fit: 1,
            pagerAnchorBuilder: function(idx, el) {
                return '<li><a href="cpage_7#"></a></li>';
            }
        });
    });

    </script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Responsive + JQuery Cycle</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="https://github.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-.git">Responsive Slideshow</a></li>
                        <li><a href="http://jquery.malsup.com/cycle/">JQuery Cycle</a></li>
                        <li>
                            <a href="http://codepen.io/fuzzywalrus/full/dbxFe/" target="_blank">View Me Full sized :)</a>
                        </li>

                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row">
            <div class="span12">
                <div class="slidecontainer">
                    <div  id="slideshow" class="fullwidth" >
                        <img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/slideimage1.jpg" width="100%" >
                        <img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/slideimage2.jpg" width="100%">
                        <img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/slideimage3.jpg" width="100%">
                    </div>
                    <img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/blank.png" width="100%" style="max-height:400px;">
                </div>
            </div>
        </div>

        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="hero-unit">
            <h1>JQuery Cycle 1.x (Responsive Slide Show)</h1>
            <p>Making a responsive slide show from my  favorite slide show plugin (because the world doesn't need yet-another-slideshow plugin). If you're viewing the pen, you'll probably want to use the <a href="http://codepen.io/fuzzywalrus/full/dbxFe/">Full version.</a> Resize this page and see what happens.</p>
        </div>


        <hr>
        <div class="row">
            <div class="span12">
                <p>Not all slide show are created equal, fortunately JQuery Cycle is exceptional and includes a containerResize property.  This allows the slideshow to resize. However, scaling a slideshow and having it maintain its height gets trickier. This project assumes the following: </p>
                <ol>
                    <li>The slide height is known prior or can be determined</li>
                    <li>The slide height is consistent</li>
                    <li>A blank PNG/GIF of equal aspect ratio can be provided</li>
                </ol>
                <hr>
                <h2>Page Mark-Up</h2>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <section>
                    <pre class="prettyprint linenums">
                        <ol class="linenums">
                            <li><span class="tag">&lt;div</span> <span class="atn">class=</span><span class="atv">"slidecontainer"</span><span class="tag">&gt;</span></li>
                            <li><span class="tag">&lt;id=</span><span class="atv">"slideshow"</span> <span class="atn">class=</span><span class="atv">"fullwidth"</span><span class="tag">&gt;</span></li>
                            <li><span class="tag">&lt;img </span><span class="atn">src=</span><span class="atv">"img/slideimage1.jpg"</span><span class="atn"> width=</span><span class="atv">"100%"</span><span class="tag">&gt;</span></li>
                            <li><span class="tag">&lt;img</span> <span class="atn">src=</span><span class="atv">"img/slideimage2.jpg"</span><span class="atn"> width=</span><span class="atv">"100%"</span><span class="tag">&gt;</span></li>
                            <li><span class="tag">&lt;img</span> <span class="atn">src=</span><span class="atv">"img/slideimage3.jpg"</span><span class="atn"> width=</span><span class="atv">"100%"</span><span class="tag">&gt;</span></li>
                            <li><span class="tag">&lt;div&gt;</span></li>
                            <li><span class="tag">&lt;img</span> <span class="atn">src=</span><span class="atv">"img/blank.png"</span><span class="atn"> width=</span><span class="atv">"100%"</span><span class="tag">&gt;</span></li>
                            <li><span class="tag">&lt;div&gt;</span></li>
                        </ol>
                    </pre>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="span3">
                <h2>Scaffolding</h2>
                Resize the window. The Slide show works even in scaffolding!
            </div>
            <div class="span9">
                <div class="slidecontainer">
                    <div  id="slideshow2" class="fullwidth" >
                        <div class="slide1"><img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/slideimage1.jpg"></div>
                        <div><img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/slideimage2.jpg" width="100%"></div>
                        <div><img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/slideimage3.jpg" width="100%"></div>
                    </div>
                    <img src="https://raw.githubusercontent.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-/master/img/blank.png" width="100%" style="max-height:400px;" class="">
                </div>
            </div>
        </div>


        <hr>
        <div class="row">
            <div class="span12">
                <h1>Using JQuery Cycle with DIVs</h1>
            </div>
        </div>

        <div class="row">
            <div class="span3">
                <h4>Using JQuery to Resize</h4>
                <p>The Responsive Slideshow JS includes a imageresize(); function grabs the height of any div within the slide show with the class of "slide1", and scales according to its height.
                </p>
                <p>Original Project:</p>
                <p> <a href="https://github.com/fuzzywalrus/Bootstrap---JQuery-Cycle--Responsive-Slide-Show-">Bootstrap + JQuery Cycle + Responsive Design</a></p>
            </div>

            <div class="span9">
                <div class="slidecontainer">
                    <div  id="slideshow4" class="fullwidth slidetarget" >
                        <div style="background-color:#EEE;" class="slide1"><div class="slidemargin"><h3>You can even use Divs</h3>Dynamic reintermediate engage holistic incentivize transparent deliver interactive repurpose envisioneer remix convergence engage. Platforms web-enabled capture engineer real-time incentivize open-source models impactful. Open-source frictionless web-enabled, "networks," schemas, "systems, beta-test," strategic; iterate, extend partnerships repurpose seamless share relationships.</div>
                    </div>
                    <div><div class="slidemargin">
                        Compelling ROI capture interactive granular networking semantic redefine methodologies holistic granular web-enabled platforms global benchmark. Efficient cutting-edge, deliver turn-key dynamic strategic scalable share eyeballs integrate AJAX-enabled relationships. Implement systems visualize cross-media, efficient channels cultivate harness; webservices interactive engage dynamic convergence web-readiness, transform value transition.</div>
                    </div>

                </div>
                <div class="blankimg"></div>
            </div>
        </div>

    </div>




    <footer>
        <p>&copy; Image Credits: <a href="http://www.flickr.com/photos/petehogan/">3dpete</a>, <a href="http://www.flickr.com/photos/rodneykeeling/">rodneykeeling</a></p>
    </footer>

</div>
</body>
</html>
