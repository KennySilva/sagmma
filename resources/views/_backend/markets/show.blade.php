@extends('_backend.master.app')
@section('style-header')
    <link rel="stylesheet" href="/bower_components/bootstrap-select/dist/css/bootstrap-select.css">
@endsection

@section('htmlheader_title')
    Mercados
@endsection

@section('contentheader_title')
    Mercado Municipal de Santa Catarina
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Mercados</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {{ csrf_field() }}
                    <!------------------------------------------------------------------------------------->
                    <show-market></show-market>
                    <!------------------------------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
@endsection
