@extends('_backend.master.app')

@section('htmlheader_title')
    Funcionarios
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabEmp" data-toggle="tab">FUNCIONÁRIOS</a></li>
                            <li><a href="#tabEmpType" data-toggle="tab">TIPOS DE FUNCIONÁRIOS</a></li>
                            <li><a href="#tabMat" data-toggle="tab">MATERIAIS</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}
                            <div class="tab-pane fade in active" id="tabEmp">
                                <show-employee></show-employee>
                            </div>

                            <div class="tab-pane fade" id="tabEmpType">
                                <show-typeofemployee></show-typeofemployee>
                            </div>

                            <div class="tab-pane fade" id="tabMat">
                                <show-material></show-material>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
