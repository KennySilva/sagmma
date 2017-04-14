@extends('_backend.master.app')
@section('sagmma-style')
    <!-------------------------------------------------------------------------------------------->
    {!! Charts::assets() !!}
    <!-------------------------------------------------------------------------------------------->
@endsection

@section('htmlheader_title')
    Utilizadores
@endsection

@section('contentheader_title')
@endsection

@section('main-content')

    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tipo de Utilizadores</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="table-responsive">
                            <center>
                                {!! $chart->render() !!}
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-default box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Utilizadores Criados Por Mês</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div style="display: none;" class="box-body">
                        <div class="table-responsive">
                            <center>
                                {!! $chart1->render() !!}
                            </center>
                        </div>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabUser" data-toggle="tab">UTILIZADORES</a></li>
                            <li><a href="#tabRole" data-toggle="tab">PAPEIS</a></li>
                            <li><a href="#tabPerm" data-toggle="tab">PERMISSÕES</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}
                            <div class="tab-pane fade in active" id="tabUser">
                                <show-users></show-users>
                            </div>

                            <div class="tab-pane fade" id="tabRole">
                                <show-role></show-role>
                            </div>

                            <div class="tab-pane fade" id="tabPerm">
                                <show-permission></show-permission>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="{{ asset('/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script>
    // $(function () {
    //     $('input').iCheck({
    //         checkboxClass: 'icheckbox_square-blue',
    //         radioClass: 'iradio_square-blue',
    //         increaseArea: '20%' // optional
    //     });
    // });

    $(document).ready(function($){
        $("#showSearchInput").click(function(){
            $("#searchPage").show();
        });
    });
    </script>
@endpush
