@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="/bower_components/bootstrap-select/dist/css/bootstrap-select.css">

    <!-------------------------------------------------------------------------------------------->
    <style media="screen">
    .panel.with-nav-tabs .panel-heading{
        padding: 5px 5px 0 5px;
    }
    .panel.with-nav-tabs .nav-tabs{
        border-bottom: none;
    }
    .panel.with-nav-tabs .nav-justified{
        margin-bottom: -1px;
    }
    /********************************************************************/
    /*** PANEL PRIMARY ***/
    .with-nav-tabs.panel-primary .nav-tabs > li > a,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
        color: #fff;
    }
    .with-nav-tabs.panel-primary .nav-tabs > .open > a,
    .with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
        color: #fff;
        background-color: #3C8DBC;
        border-color: transparent;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a,
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
        color: #3C8DBC;
        background-color: #fff;
        border-color: #3C8DBC;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #3C8DBC;
        border-color: #3C8DBC;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #fff;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #3C8DBC;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        background-color: #4a9fe9;
    }

    </style>
    {!! Charts::assets() !!}
    <!-------------------------------------------------------------------------------------------->
@endsection

@section('htmlheader_title')
    Utilizadores
@endsection

@section('contentheader_title')
    <div class="col-md-12">
        Gerir Utilizadores
    </div>
@endsection

@section('main-content')

    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary box-solid collapsed-box">
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
                <div class="box box-primary box-solid collapsed-box">
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
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabUser" data-toggle="tab">Utilizadores</a></li>
                            <li><a href="#tabRole" data-toggle="tab">Papeis</a></li>
                            <li><a href="#tabPerm" data-toggle="tab">Permissões</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tabUser">
                                {{ csrf_field() }}
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

    <script src="/bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script>

    <script>
    // $('#popover').popover({
    //     html : true,
    //     title: function() {
    //         return $("#popover-head").html();
    //     },
    //     content: function() {
    //         return $("#popover-content").html();
    //     }
    // });

    $(document).ready(function(){
        $("#showSearchInput").click(function(){
            $("#searchPage").show();
        });
    });

    $(document).ready(function(){
        $('#tel').mask('(00) 0000-0000');
    });

    </script>
@endpush
