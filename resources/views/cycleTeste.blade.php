<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="{{ asset('/bower_components/jquery/dist/jQuery.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('/bower_components/jquery.easing/js/jquery.easing.js') }}"></script>

    <script src="{{ asset('/bower_components/jquery-cycle/jquery.cycle.all.js') }}"></script>

    <style media="screen">
    * {
        margin: 0;
        padding: 0;
    }

    .box-slider {
        width: 100%;
        margin: 0 auto;
        position: relative;
    }
    .slider {
        width: 100%;
        height: 450px;
        overflow: hidden;
        margin: 0 auto;
    }

    .slider-item {
        width: 100%;
        height: 450px;
        position: relative;
    }

    .slider-item p {
        padding: 10px;
        width: 500px;
        font-family: normal 13px Arial;
        line-height: 20px;
        color: #ba9393;
        background: rgba(0, 0, 0, 0.5);
        position: absolute;
        bottom: 0px;
        left: 0px;
    }

    .pager {
        position: absolute;
        z-index: 999;
        bottom: 10px;
        right: 15px;
    }
    .next {
        position: absolute;
        z-index: 999;
        top: 170px;
        right: 10px;
        font-size: 30px;
        font-family: 'Lato';
        color: rgba(#d2d6de, 0.62);

    }
    .prev {
        position: absolute;
        z-index: 999;
        top: 170px;
        right: 60px;

        font-size: 30px;
        font-family: 'Lato';
        color: rgba(#d2d6de, 0.62);
    }



    .prev:hover {
        color: #2fa0c9;
        cursor: pointer;
    }

    .next:hover {
        color: #2fa0c9;
        cursor: pointer;
    }

    .pager a {
        display:block;
        width: 10px;
        height: 10px;
        /*padding: 5px;*/
        -moz-border-radius: 100%;
        -webkit-border-radius: 100%;
        background: #ffffff;
        float: left;
        margin: 0 3px;
        cursor: pointer;

    }
    .pager a:hover {
        background: #2fa0c9;
    }

    .pager a.sliderActived {
        background: #2fa0c9;
    }

    .demo-3 {
    position:relative;
    width:300px;
    height:200px;
    overflow:hidden;
    float:left;
    margin-right:20px
}
.demo-3 figure {
    margin:0;
    padding:0;
    position:relative;
    cursor:pointer;
    margin-left:-50px
}
.demo-3 figure img {
    display:block;
    position:relative;
    z-index:10;
    margin:-15px 0
}
.demo-3 figure figcaption {
    display:block;
    position:absolute;
    z-index:5;
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box
}
.demo-3 figure h2 {
    font-family:'Lato';
    color:#fff;
    font-size:20px;
    text-align:left
}

.demo-3 figure figcaption {
    top:0;
    left:0;
    width:100%;
    height:100%;
    padding:29px 44px;
    background-color:rgba(26,76,110,0.5);
    text-align:center;
    backface-visibility:hidden;
    -webkit-transform:rotateY(-180deg);
    -moz-transform:rotateY(-180deg);
    transform:rotateY(-180deg);
    -webkit-transition:all .5s;
    -moz-transition:all .5s;
    transition:all .5s
}
.demo-3 figure img {
    backface-visibility:hidden;
    -webkit-transition:all .5s;
    -moz-transition:all .5s;
    transition:all .5s
}
.demo-3 figure:hover img,figure.hover img {
    -webkit-transform:rotateY(180deg);
    -moz-transform:rotateY(180deg);
    transform:rotateY(180deg)
}
.demo-3 figure:hover figcaption,figure.hover figcaption {
    -webkit-transform:rotateY(0);
    -moz-transform:rotateY(0);
    transform:rotateY(0)
}
    </style>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.slider').cycle({
            fx:      'fade, shuffle',
            sync: true,
            next: '#next',
            prev: '#prev',
            speed:    1000,
            timeout:  5000,
            pager: $('.pager'),
            pagerAnchorBuilder: function(index, DOMelement) {
                return '<a></a>'
            },
            activePagerClass: 'sliderActived',
            fit: 1,
            containerResize: 0,
            width: '100%',
        });
    });

    </script>

</head>

<body>

    <div class="container-fluid">

        <div class="box-slider">
            <span class="pager"></span>
            <span class="next" id="next"><span class="glyphicon glyphicon-menu-right"></span></span>
            <span class="prev" id="prev"><span class="glyphicon glyphicon-menu-left"></span></span>
            <div class="slider">
                <div class="slider-item">
                    <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                    <img src="img/frontend_img/slide/slide_1.jpg" width="100%" height="450"/>
                </div>

                <div class="slider-item">
                    <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                    <img src="img/frontend_img/slide/slide_2.jpg" width="100%" height="450"/>
                </div>

                <div class="slider-item">
                    <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                    <img src="img/frontend_img/slide/slide_3.jpg" width="100%" height="450"/>
                </div>

                <div class="slider-item">
                    <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                    <img src="img/frontend_img/slide/slide_4.jpg" width="100%" height="450"/>
                </div>
            </div>
        </div>


        <ul class="demo-3">
            <li>
                <figure>
                    <img src="http://lorempixel.com/400/400" alt="Placeholder">
                    <figcaption>
                        <h2>This is a cool title!</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
                    </figcaption>
                </figure>
            </li>
        </ul>


    </div>


</body>
</html>
