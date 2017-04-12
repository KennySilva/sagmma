@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/sagmma/app.css" media="screen" title="no title">
@endsection

@section('htmlheader_title')
    Perfil do Utilizador
@endsection

@section('contentheader_title')
    Perfil do Utilizador
@endsection

@section('main-content')
    <div class="sagmma_container">
        @include('_backend.master.partials.profileGeral')
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>

    <script>
    $("#input-2").fileinput({
        language: "pt",
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        showPreview: false,
        browseIcon: "<i class=\"fa fa-user-circle-o\"></i> ",
        allowedFileExtensions: ["jpg", "png", "gif"],
        theme: "gly",
    });


    $(function functionName() {
        $('#passEdit').popover({
            placement: 'top',
            title: 'Alterar Palavra Passe',
            html:true,
            content:  $('#editPassword').html()
        });
    });

    // $(document).ready(function() {
    //     $(".state").select2();
    // });

    </script>

@endpush
