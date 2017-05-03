@extends('_backend.master.app')
@section('sagmma-style')
    {!! Charts::assets() !!}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">

@endsection

@section('htmlheader_title')
    Cobrança de Impostos
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default box-solid collapsed-box">
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
                <div class="box box-default box-solid collapsed-box">
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
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabTax" data-toggle="tab">COBRANÇA</a></li>
                            @permission(['manage-resources'])
                            <li><a href="#tabEmp" data-toggle="tab">FUNCIONÁRIOS</a></li>
                            <li><a href="#tabPla" data-toggle="tab">ESPAÇOS</a></li>
                            @endpermission
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}
                            <div class="tab-pane fade in active" id="tabTax">
                                <show-taxation></show-taxation>
                            </div>
                            @permission(['manage-resources'])

                            <div class="tab-pane fade" id="tabEmp">
                                <show-employee></show-employee>
                            </div>

                            <div class="tab-pane fade" id="tabPla">
                                <show-place></show-place>
                            </div>
                            @endpermission
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
    <script>

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
    </script>

@endpush
