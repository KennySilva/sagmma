@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="/bower_components/bootstrap-select/dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="/css/sagmma/app.css" media="screen" title="no title">
@endsection

@section('htmlheader_title')
    Criar usuário
@endsection

@section('contentheader_title')
    Criar Novo Usuário
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Informações do Usuário</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {{ csrf_field() }}
                    <create-user></create-user>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="/bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script>
@endpush
