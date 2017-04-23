@extends('_backend.master.app')

@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
    <!------------------------------------------------------------------------------------------------------>
    <style media="screen">
    #exTab2 h3 {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }
    </style>

    <!----------------------------------------------------------------------------------------------------->

@endsection

@section('htmlheader_title')
    Espaços
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
    <div class="sagmma_container">

        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabProd" data-toggle="tab">PROMOÇÕES</a></li>
                            <li><a href="#tabPromo" data-toggle="tab">PRODUTOS</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}
                            <div class="tab-pane fade in active" id="tabProd">
                                <show-promotion></show-promotion>
                            </div>

                            <div class="tab-pane fade" id="tabPromo">
                                <show-product></show-product>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>
    {{-- Responsavel pro apresentar data nos navegadores como Fire Fox e EI 10 --}}
    <script>
    webshims.setOptions('waitReady', false);
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');

    $("#articleimage").fileinput({
        language: "pt",
        showUpload: false,
        allowedFileExtensions: ["jpg", "png", "gif"],
        theme: "gly",
    });

    </script>

@endpush
