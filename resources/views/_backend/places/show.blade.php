@extends('_backend.master.app')

@section('sagmma-style')
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
        {{-- <div class="row">
            <div class="col-md-6">
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estatistíca</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="table-responsive">
                            <center>
                                {!! $place_chart->render() !!}
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">

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
                                    <a  href="#1" data-toggle="tab">ESPAÇOS</a>
                                </li>
                                <li><a href="#2" data-toggle="tab">TIPOS DE ESPAÇOS</a>
                                </li>
                            </ul>

                            <div class="tab-content ">
                                <div class="tab-pane active" id="1">
                                    <br>
                                    <!------------------------------------------------------------------------------------->
                                    <show-place></show-place>
                                    <!------------------------------------------------------------------------------------->
                                </div>
                                <div class="tab-pane" id="2">
                                    <br>
                                    <!------------------------------------------------------------------------------------->
                                    <show-typeofplace></show-typeofplace>
                                    <!-------------------------------------------------------------------------------------->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
