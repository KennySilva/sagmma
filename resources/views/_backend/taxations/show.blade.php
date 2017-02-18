@extends('_backend.master.app')
@section('sagmma-style')

    {{-- <link rel="stylesheet" href="/bower_components/bootstrap-select/dist/css/bootstrap-select.css"> --}}
    {{-- <link rel="stylesheet" href="/bower_components/chosen/chosen.css"> --}}
@endsection

@section('htmlheader_title')
    Gerir Cobranças
@endsection

@section('contentheader_title')
    Gerir Cobranças
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Gerir Cobranças</h3>
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
@endsection
@push('scripts')
    <script src="/bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script>

    {{-- Responsavel pro apresentar data nos navegadores como Fire Fox e EI 10 --}}
    <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');

    // $(document).ready(function () {
    //        $('.datepicker').datepicker({
    //            format: 'dd/mm/yyyy',
    //            language: 'pt-BR'
    //        });
    //    });

    </script>

@endpush



{{-- @push('scripts') --}}
{{-- <script src="/bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script> --}}
{{-- <script src="/bower_components/chosen/chosen.jquery.js" charset="utf-8"></script>

<script>
$('.contact-select').chosen({});
</script> --}}
{{-- @endpush --}}
