@extends('_frontend.master.app')

@section('front-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
    <link href="{{ asset('/css/back/back.css') }}" rel="stylesheet" type="text/css"/>

    <style media="screen">
    .junb-styele {
        border-radius: 0px;
        background: #ffffff;
        border-bottom: 4px solid #7e7e7e;
        background-image: url("img/frontend_img/slide/slide_2.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: top;
        background-origin: content-box;
    }

    .text-style {
        color: #ffffff;
        text-shadow: -2px 0px 10px rgba(152, 145, 103, 1);
    }
    </style>


@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="jumbotron junb-styele">
                <div style="padding-top: 20px;" class="text-center">
                    <img class="img-responsive" src="/uploads/avatars/{!! Auth::user()->avatar !!}" alt="Placeholder" style="width: 150px; height: 150px; border-radius: 50%;">
                </div>
                <div class="text-left">
                    <h4 class="text-style"><span>@</span>{{Auth::user()->name}}</h4>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <section  class="main">
                    <div class="row">
                        <section  class="posts col-md-9">
                            <div class="col-md-12">
                                <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tabProd" data-toggle="tab">Produtos</a></li>
                                            <li><a href="#tabPromo" data-toggle="tab">Promoções</a></li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            {{ csrf_field() }}
                                            <div class="tab-pane fade in active" id="tabProd">
                                                <show-product></show-product>
                                            </div>
                                            <div class="tab-pane fade" id="tabPromo">
                                                <show-promotion></show-promotion>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>
                        <aside class="col-md-3 hidden-xs hidden-sm">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">Produtos Recentes</li>
                                @foreach ($products as $product)
                                    <li class="list-group-item">{{$product->name}}</li>
                                @endforeach
                            </ul>

                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning">Publicações Recentes</li>
                                @foreach ($promotions as $promotion)
                                    <li class="list-group-item">{{$promotion->name}}</li>
                                @endforeach
                            </ul>

                            <ul class="list-group">
                                <li class="list-group-item list-group-item-success">Publicações Autorizadas <span class="badge faa-horizontal animated">{{$promotionAtived->count()}}</span>
                                </li>

                                @foreach ($promotionAtived as $promoAct)
                                    <li class="list-group-item">{{$promoAct->name}}</li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>

    <script type="text/javascript">
    $("#articleimage").fileinput({
        language: "pt",
        showUpload: false,
        allowedFileExtensions: ["jpg", "png", "gif"],
        theme: "gly",
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
