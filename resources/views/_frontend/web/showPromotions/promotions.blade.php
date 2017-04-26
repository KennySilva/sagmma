@extends('_frontend.master.app')

@section('front-style')
<style media="screen">

#custom_carousel .item  .top {
    overflow:hidden;
    max-height:300px;
    margin-bottom:15px;
}
#custom_carousel .item {

    color:#000;
    background-color:#fff;
    padding:20px 0;
    overflow:hidden
}
#custom_carousel .item img{
    width:100%;
    height:auto
}

#custom_carousel .izq
{
    position:absolute;
    left: -25px;
    top:40%;
    background-image: none;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px;
    height: 40px;
    width : 40px;
    margin-top: 30px;
}
/* Next button  */
#custom_carousel .der
{
    position:absolute;
    right: -25px !important;
    top:40%;
    left:inherit;
    background-image: none;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px;
    height: 40px;
    width : 40px;
    margin-top: 30px;
}
#custom_carousel .controls{

    overflow:hidden;
    padding:0;
    margin:0;
    white-space: nowrap;
    text-align: center;
    position: relative;
    background:#fff;
    border:0;
}
#custom_carousel .controls .nav{

    padding:0;
    margin:0;
    white-space: nowrap;
    text-align: center;
    position: relative;
    background:#fff;
    width: auto;
    border: 0;
}
#custom_carousel .controls li {
    transition: all .5s ease;
    display: inline-block;
    max-width: 100px;
    height: 90px;
    opacity:.5;
}
#custom_carousel .controls li a{
    padding:0;
}
#custom_carousel .controls li img{
    width:100%;
    height:auto
}

#custom_carousel .controls li.active {
    background-color:#fff;
    opacity:1;
}
#custom_carousel .controls a small {
    overflow:hidden;
    display:block;
    font-size:10px;
    margin-top:5px;
    font-weight:bold
}
</style>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">


            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

            <div class="container-fluid">
                <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfNTNcc2OcD-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 1</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfdaC7_IvMS-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 2</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 3</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfNTNcc2OcD-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 1</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfdaC7_IvMS-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 2</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 3</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 3</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg" class="img-responsive"></div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide 3</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore, magni illum nemo ipsum quod voluptates ab natus nulla possimus incidunt aut neque quaerat mollitia perspiciatis assumenda asperiores consequatur soluta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Item -->
                    </div>
                    <a data-slide="prev" href="#custom_carousel" class="izq carousel-control">‹</a>
                    <a data-slide="next" href="#custom_carousel" class="der carousel-control">›</a>
                    <!-- End Carousel Inner -->
                    <div class="controls draggable ui-widget-content col-md-6 col-xs-12">
                        <ul class="nav ui-widget-header">

                            <li data-target="#custom_carousel" data-slide-to="0" class="active"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfNTNcc2OcD-1.jpg"><small>Slide One</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="1"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfdaC7_IvMS-1.jpg"><small>Slide Two</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="2"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg"><small>Slide Three</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="3"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfNTNcc2OcD-1.jpg"><small>Slide Four</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="4"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfdaC7_IvMS-1.jpg"><small>Slide Five</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="5"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg"><small>Slide Six</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="6"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg"><small>Slide Six</small></a></li>
                            <li data-target="#custom_carousel" data-slide-to="7"><a href="#"><img src="http://disecor.imaginacolombia.com/assets/mfiaASNcDB7-1.jpg"><small>Slide Six</small></a></li>

                        </ul>
                    </div>
                </div>
                <!-- End Carousel -->
            </div>
        </div>
        <br><hr><br>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="http://lorempixel.com/200/200" alt="Placeholder">
                            <div class="caption">
                                <h3>Thumbnail label</h3>
                                <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="http://lorempixel.com/200/200" alt="Placeholder">

                            <div class="caption">
                                <h3>Thumbnail label</h3>
                                <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="http://lorempixel.com/200/200" alt="Placeholder">

                            <div class="caption">
                                <h3>Thumbnail label</h3>
                                <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="http://lorempixel.com/200/200" alt="Placeholder">

                            <div class="caption">
                                <h3>Thumbnail label</h3>
                                <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="http://lorempixel.com/200/200" alt="Placeholder">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="http://lorempixel.com/200/200" alt="Placeholder">

                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="http://lorempixel.com/200/200" alt="Placeholder">

                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="http://lorempixel.com/200/200" alt="Placeholder">

                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Lgfrejhgferg eirugfuyrgef uyegfuygfr erfvruyve</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-2">

    </div>
</div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
    $(document).ready(function(ev){
        var items = $(".nav li").length;
        var leftRight=0;
        if(items>5){
            leftRight=(items-5)*50*-1;
        }
        $('#custom_carousel').on('slide.bs.carousel', function (evt) {


            $('#custom_carousel .controls li.active').removeClass('active');
            $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
        })
        $('.nav').draggable({
            axis: "x",
            stop: function() {
                var ml = parseInt($(this).css('left'));
                if(ml>0)
                $(this).animate({left:"0px"});
                if(ml<leftRight)
                $(this).animate({left:leftRight+"px"});

            }

        });
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
