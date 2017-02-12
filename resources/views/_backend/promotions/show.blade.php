@extends('_backend.master.app')

@section('sagmma-style')
    <link rel="stylesheet" href="/bower_components/bootstrap-select/dist/css/bootstrap-select.css">

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
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Gerir Recursos</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {{ csrf_field() }}

                    <div id="exTab2" class="">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a  href="#1" data-toggle="tab">PROMOÇÕES</a>
                            </li>
                            <li><a href="#2" data-toggle="tab">PRODUTOS</a>
                            </li>
                        </ul>

                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                <show-promotion></show-promotion>
                                <!------------------------------------------------------------------------------------->
                            </div>
                            <div class="tab-pane" id="2">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                <show-product></show-product>
                                <!-------------------------------------------------------------------------------------->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script>

    {{-- Responsavel pro apresentar data nos navegadores como Fire Fox e EI 10 --}}
    <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
    </script>

@endpush
