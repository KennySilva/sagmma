@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="/bower_components/bootstrap-select/dist/css/bootstrap-select.css">

    <!-------------------------------------------------------------------------------------------->
    <style media="screen">
    #exTab2 h3 {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }



    .det{
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .l_det{
        display: inline;
        color: #fff;
        background-color: #333;
    }

    </style>
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
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Utilizadores</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div id="exTab2" class="">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a  href="#1" data-toggle="tab">Utilizadores</a>
                            </li>
                            <li><a href="#2" data-toggle="tab">Papéis</a>
                            </li>
                            <li><a href="#3" data-toggle="tab">Permissões</a>
                            </li>
                            <li><a href="#4" data-toggle="tab">Papéis dos Utilzadores</a>
                            </li>
                            <li><a href="#5" data-toggle="tab">Permissões dos Papéis</a>
                            </li>
                        </ul>

                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <br>
                                {{ csrf_field() }}
                                <!------------------------------------------------------------------------------------->
                                <show-users></show-users>
                                <!------------------------------------------------------------------------------------->
                            </div>
                            <div class="tab-pane" id="2">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                <show-role></show-role>
                                <!------------------------------------------------------------------------------------->
                            </div>
                            <div class="tab-pane" id="3">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                <show-permission></show-permission>

                                <!------------------------------------------------------------------------------------->
                            </div>
                            <div class="tab-pane" id="4">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                    <show-role></show-role>
                                <!------------------------------------------------------------------------------------->
                            </div>
                            <div class="tab-pane" id="5">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                    <show-role></show-role>
                                <!------------------------------------------------------------------------------------->
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

    </script>
@endpush
