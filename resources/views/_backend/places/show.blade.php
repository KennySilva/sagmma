@extends('_backend.master.app')

@section('htmlheader_title')
    Espaços
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
                            <li class="active"><a href="#tabPlace" data-toggle="tab">ESPAÇOS</a></li>
                            <li><a href="#tabPlacet" data-toggle="tab">TIPOS DE ESPAÇOS</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}
                            <div class="tab-pane fade in active" id="tabPlace">
                                <!------------------------------------------------------------------------------------->
                                <show-place></show-place>
                                <!------------------------------------------------------------------------------------->
                            </div>

                            <div class="tab-pane fade" id="tabPlacet">
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
@endsection
