@extends('_frontend.master.app')

@section('front-style')
<style media="screen">
body {
    padding-top: 50px;
}

.thumbnail {
    position:relative;
    overflow:hidden;
}

.caption {
    position:absolute;
    top:0;
    right:0;
    background:rgba(57, 63, 69, 0.75);
    width:100%;
    height:100%;
    padding:2%;
    display: none;
    text-align:center;
    color:#fff !important;
    z-index:2;
}

.col-big{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    width:20%;
}

/*-----------------------------------------------------------------*/

.hovereffect {
    width: 100%;
    height: 100%;
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
}

.hovereffect .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    background-color: rgba(75,75,75,0.7);
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}

.hovereffect:hover .overlay {
    background-color: rgba(48, 152, 157, 0.4);
}

.hovereffect img {
    display: block;
    position: relative;
}

.hovereffect h2 {
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    position: relative;
    font-size: 17px;
    padding: 10px;
    background: rgba(0, 0, 0, 0);
    -webkit-transform: translateY(45px);
    -ms-transform: translateY(45px);
    transform: translateY(45px);
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}

.hovereffect:hover h2 {
    background: rgba(0, 0, 0, 0.7);

    -webkit-transform: translateY(5px);
    -ms-transform: translateY(5px);
    transform: translateY(5px);
    margin:0px;
}

.hovereffect p.info {
    display: inline-block;
    text-decoration: none;
    padding: 7px 14px;
    text-transform: uppercase;
    color: #fff;
    border-bottom: 1px solid #fff;
    background-color: transparent;
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
    font-weight: normal;
    margin: 7px;
}

.hovereffect:hover p.info {
    opacity: 1;
    filter: alpha(opacity=100);
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
}

.hovereffect p.info:hover {
    box-shadow: 0 0 5px #fff;
}
</style>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-10">
            <h1>Laod do um</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-md-2">
            <h1>lado do 2</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>

    

    <div class="row">
        <div class="col-md-12 col-md-offset-1">

            <div class="col-md-3">
                <div class="thumbnail">
                    <div class="caption">
                        <h4>Thumbnail Headline</h4>
                        <p>short thumbnail description</p>
                        <p><a href="" class="label label-danger" rel="tooltip" title="Zoom">Zoom</a>
                            <a href="" class="label label-default" rel="tooltip" title="Download now">Download</a></p>
                        </div>
                        <img src="http://lorempixel.com/400/300/sports/1/" alt="...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>Thumbnail Headline</h4>
                            <p>short thumbnail description</p>
                            <p><a href="" class="label label-danger" rel="tooltip" title="Zoom">Zoom</a>
                                <a href="" class="label label-default" rel="tooltip" title="Download now">Download</a></p>
                            </div>
                            <img src="http://lorempixel.com/150/200/sports/2/" alt="...">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption">
                                <h4>Thumbnail Headline</h4>
                                <p>short thumbnail description</p>
                                <p><a href="" class="label label-danger" rel="tooltip" title="Zoom">Zoom</a>
                                    <a href="" class="label label-default" rel="tooltip" title="Download now">Download</a></p>
                                </div>
                                <img class="img-rounded" src="http://lorempixel.com/400/300/sports/3/" alt="...">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <h1>bootstrap image thumbnail hover effect text</h1>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="http://placehold.it/350x200" alt="">
                            <div class="overlay">
                                <h2>Image heading</h2>
                                <p class="info">Our sleek quality work and
                                    <a href="#">read more</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="http://placehold.it/350x200" alt="">
                                <div class="overlay">
                                    <h2>Image heading</h2>
                                    <p class="info">Our sleek quality work and
                                        <a href="#">read more</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="http://placehold.it/350x200" alt="">
                                    <div class="overlay">
                                        <h2>Image heading</h2>
                                        <p class="info">Our sleek quality work
                                            <a href="#">read more</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        @endsection

                        @push('scripts')

                            <script type="text/javascript">

                            $( document ).ready(function() {
                                $("[rel='tooltip']").tooltip();

                                $('.thumbnail').hover(
                                    function(){
                                        $(this).find('.caption').slideDown(250); //.fadeIn(250)
                                    },
                                    function(){
                                        $(this).find('.caption').slideUp(250); //.fadeOut(205)
                                    }
                                );
                            });



                            $(document).ready(function(ev){

                                //Changing the url after click on link 'NOTICIA'
                                $("#sagmma").attr("href", "/");
                                $("#mmsc").attr("href", "/");
                                $("#valores").attr("href", "/");
                                $("#galeria").attr("href", "/");
                                $("#equipa").attr("href", "/");
                                $("#contactar").attr("href", "/");
                                $("#myPage").attr("href", "/");
                            });

                            </script>
                        @endpush
