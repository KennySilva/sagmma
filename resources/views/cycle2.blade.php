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

    <script src="{{ asset('/bower_components/jquery-cycle2/build/jquery.cycle2.js') }}"></script>

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
        color: #fff;
        background: rgba(0, 0, 0, 0.8);
        position: absolute;
        bottom: 10px;
        left: 10px;

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
        right: 15px;
        font-size: 50px;
        font-family: 'Lato';
        color: #D2D6DE;

    }
    .prev {
        position: absolute;
        z-index: 999;
        top: 170px;
        left: 15px;
        font-size: 50px;
        font-family: 'Lato';
        color: #D2D6DE;

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
    </style>


</head>

<body>

    <div class="container-fluid">

        {{-- <div class="box-slider">
        <span class="pager"></span>
        <span class="next" id="next"><span class="glyphicon glyphicon-menu-right"></span></span>
        <span class="prev" id="prev"><span class="glyphicon glyphicon-menu-left"></span></span>
        <div class="cycle-slideshow slider">
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
</div> --}}


<div class="cycle-slideshow" data-cycle-fx="scrollHorz"
data-cycle-pause-on-hover="true"
data-cycle-speed="200">
<img src="img/frontend_img/slide/slide_1.jpg" width="100%" height="450"/>
<img src="img/frontend_img/slide/slide_2.jpg" width="100%" height="450"/>
<img src="img/frontend_img/slide/slide_3.jpg" width="100%" height="450"/>
<img src="img/frontend_img/slide/slide_4.jpg" width="100%" height="450"/>
</div>

</div>
</body>
</html>
