
@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
@endsection
@section('htmlheader_title')
    Importar Funcionários
@endsection

@section('contentheader_title')
    Importar Ficheiros Excel
@endsection

@section('main-content')
    <div class="sagmma_container">

        <div class="col-md-6">
            <form class="" action="postEmployeeImport" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="employee" class="control-label">Selecionar um Ficheiro CSV para Importar</label>
                    <input v-model="employeeExcel" type="file" name="employee" value=""  id="excelInput">
                </div>
                <hr>
                <div class="form-group">
                    <button v-if="employeeExcel != ''" type="submit" class="btn btn-link">
                        <i class="fa fa-upload"></i> Importar
                    </button>

                    <a class="btn btn-link" href="/sagmma/employees"><i class="fa fa-undo"></i> Voltar</a>
                </div>
                <hr>
                <br>
                <span class="text-help text-warning"><i class="fa fa-exclamation-triangle"></i> Nota: Certifique que o ficheiro execel contem informações válidadas para a Base de Dados</span>
            </form>
        </div>
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
