
@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
@endsection
@section('htmlheader_title')
    Importar Funcionários
@endsection

@section('contentheader_title')
    Importar informações de Funcionários em Ficheiros Excel
@endsection

@section('main-content')
    <div class="col-md-6">
        <form class="" action="postEmployeeImport" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="employee" class="control-label">Selecionar um Ficheiro CSV para Importar</label>
                <input v-model="employeeExcel" type="file" name="employee" value=""  id="excelInput">
            </div>

            <div class="form-group">
                <button v-if="!employeeExcel" type="submit" class="btn btn-primary">
                    <i class="fa fa-upload"></i>
                </button>

                <a class="btn btn-primary" href="/sagmma/employees"><i class="fa fa-undo"></i></a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>

    <script>
    $("#excelInput").fileinput({
        language: "pt",
        showUpload: false,
        allowedFileExtensions: ["csv"],
        theme: "gly",
    });
    </script>
@endpush
