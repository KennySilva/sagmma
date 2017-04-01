@extends('_backend.master.app')
@section('sagmma-style')
    {!! Charts::assets() !!}
@endsection

@section('htmlheader_title')
    Cobrança de Impostos
@endsection

@section('contentheader_title')
    Cobrança de Impostos
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary box-solid collapsed-box">
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
                                {!! $chart->render() !!}
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estatistíca</h3>
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
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cobrança de Impostos</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="exTab2" class="">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a  href="#1" data-toggle="tab">Cobranças de Imposto</a>
                                </li>
                                <li><a href="#2" data-toggle="tab">Funcionários</a>
                                </li>
                                <li><a href="#3" data-toggle="tab">Espaços</a>
                                </li>
                            </ul>

                            <div class="tab-content ">
                                <div class="tab-pane active" id="1">
                                    <br>
                                    {{ csrf_field() }}
                                    <!------------------------------------------------------------------------------------->
                                    <show-taxation></show-taxation>
                                    <!------------------------------------------------------------------------------------->
                                </div>
                                <div class="tab-pane" id="2">
                                    <br>
                                    <!------------------------------------------------------------------------------------->
                                    <show-employee></show-employee>
                                    <!------------------------------------------------------------------------------------->
                                </div>
                                <div class="tab-pane" id="3">
                                    <br>
                                    <!------------------------------------------------------------------------------------->
                                    <show-place></show-place>
                                    <!------------------------------------------------------------------------------------->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

    </script>

@endpush
