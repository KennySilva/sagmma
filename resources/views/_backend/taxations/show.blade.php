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
                    {{ csrf_field() }}
                    <!------------------------------------------------------------------------------------->
                    <show-taxation></show-taxation>
                    <!------------------------------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- <script src="/bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script> --}}
    {{-- <script src="/bower_components/chosen/chosen.jquery.js" charset="utf-8"></script>

    <script>
    $('.contact-select').chosen({});
    </script> --}}
@endpush
