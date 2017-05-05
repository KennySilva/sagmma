@extends('_frontend.master.app')

@section('front-style')
    <link rel="stylesheet" href="/bower_components/bootstrap-star-rating/css/star-rating.css">
    <style media="screen">

    #custom_carousel .item  .top {
        overflow:hidden;
        max-height:300px;
        margin-bottom:15px;
    }
    #custom_carousel .item {

        color:#000;
        background-color:#f7b82b;
        padding:20px 0;
        margin-top:20px;
        overflow:hidden
    }
    #custom_carousel .item img{
        width:100%;
        height:auto
    }

    .myCaroucel {
        border-radius: 0px;
    }

    #custom_carousel .izq
    {
        position:absolute;
        left: -15px;
        top:40%;
        background-image: none;
        background: none repeat scroll 0 0 #222222;
        border: 4px solid #FFFFFF;
        height: 40px;
        width : 40px;
        margin-top: 30px;
    }
    /* Next button  */
    #custom_carousel .der
    {
        position:absolute;
        right: -15px !important;
        top:40%;
        left:inherit;
        background-image: none;
        background: none repeat scroll 0 0 #222222;
        border: 4px solid #FFFFFF;
        height: 40px;
        width : 40px;
        margin-top: 30px;
    }

    .my-img-thumbnail {
        border-radius: 3px;
        border: 3px #f7b82b solid;
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
                    <div class="carousel-inner myCaroucel">
                        <div class="item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="top col-md-6 col-xs-12">
                                        <img src="http://lorempixel.com/200/200" alt="Placeholder">
                                    </div>
                                    <div class="content col-md-6 col-xs-12">
                                        <h2>Slide1</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($slidePromotions as $slidePromotion)
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="top col-md-6 col-xs-12 col-md-push-2">
                                                <img class="img-responsive" src="/uploads/uploadsImages/products/{{$slidePromotion->product->photo}}" alt="Placeholder" style="width:200px; height: 200px;">
                                        </div>
                                        <div class="content text-center col-md-6 col-xs-12">
                                            <h2>{{$slidePromotion->name}}</h2>
                                            <p>{{$slidePromotion->description}}</p>
                                            <br>
                                            <h5>Comerciante: <span class="text-uppercase">{{$slidePromotion->trader->name}}</span></h5>
                                            <h5>Contacto: <span class="label label-primary">{{$slidePromotion->trader->phone}}</span></h5>

                                            <br>
                                            @foreach ($slidePromotion->trader->places as $place)
                                                Espaço: <i>{{$place->name}}</i>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- End Item -->
                    </div>
                    <a data-slide="prev" href="#custom_carousel" class="izq carousel-control">‹</a>
                    <a data-slide="next" href="#custom_carousel" class="der carousel-control">›</a>

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                  <li style="background-color: #f7b82b;" class="list-group-item"><b>Ultimas Promoções</b></li>
                  @foreach ($slidePromotions as $slidePromotion)
                      <li class="list-group-item"><a href="#">{{$slidePromotion->name}}</a></li>

                  @endforeach

                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($allPromotions as $promo)
                        <div class="col-sm-6 col-md-3">
                            <div class="my-img-thumbnail thumbnail teamThumb thumbTeam">
                                <img class="" src="/uploads/uploadsImages/products/{{$promo->product->photo}}" alt="Placeholder">
                                <div class="caption teamCaption captionTeam">
                                    <h5 class="text-uppercase">{{$promo->name}}</h5>
                                    <hr>
                                    <p><a href="#" class="btn btn-warning" role="button">Detalhes</a></p>

                                        {{-- <input id="input-3" name="input-name" type="number" class="rating"> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="/bower_components/bootstrap-star-rating/js/star-rating.js" charset="utf-8"></script>
    <script src="/bower_components/bootstrap-star-rating/js/star-rating_locale_pt-br.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).on('ready', function(){
        $('#input-3').rating({
            showCaption: false,
            showClear: false,
            // step: 0.5,
            // size: 'xs',
            // min: 0,
            // max: 5,
            // step: 0.1,
            // stars: 5,
        });
    });

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
