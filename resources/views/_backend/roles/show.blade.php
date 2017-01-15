@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="/bower_components/bootstrap-select/dist/css/bootstrap-select.css">
    
@endsection

@section('htmlheader_title')
    Funções
@endsection

@section('contentheader_title')
    <div class="col-md-12">
        Gerir Funções
    </div>
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Funções</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {{ csrf_field() }}
                    <!------------------------------------------------------------------------------------->
                    <show-role></show-role>
                    <!------------------------------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
@endsection
