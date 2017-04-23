@extends('_frontend.master.app')

@section('front-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
    <link href="{{ asset('/css/back/back.css') }}" rel="stylesheet" type="text/css"/>


@endsection

@section('content')
    <div class="jumbotron" style="border-radius: 0px; background: #5C5F56;">
        <h3 class="text-center">Eles Vão Conhecer o Meu Negócio Ainda Hoje...</h3>
    </div>
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
                            <li class="list-group-item disabled">Produtos Recentes</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>

                        <ul class="list-group">
                            <li class="list-group-item disabled">Publicações Autorizadas</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </aside>
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
