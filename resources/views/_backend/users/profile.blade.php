@extends('_backend.master.app')
@section('style-header')
    <link rel="stylesheet" href="/bower_components/bootstrap-fileinput/css/fileinput.css">
    <link rel="stylesheet" href="/css/sagmma/app.css" media="screen" title="no title">
@endsection

@section('htmlheader_title')
    Perfil do usuário
@endsection

@section('contentheader_title')
    Perfil do usuário
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Perfil de "{!! $user->name !!}"</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-10 col-md-offset-2">
                    <img src="/uploads/avatars/{!! $user->avatar !!}" alt="Imagem do Usuário" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px" />
                    <h3>{!! $user->name !!}</h3>

                    <form class="" enctype="multipart/form-data" action="/user/profiles" method="post">
                        <label class="control-label" for="">Atualizar Imagem</label>

                        <input v-model="updateimage" id="input-2" type="file" multiple class="file-loading" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input :disabled="!updateimage" type="submit" class="pull-right btn btn-primary" name="name" value="Actualiar">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
    $(document).on('ready', function() {
        $("#input-2").fileinput({showCaption: false});
    });
    </script>

    <script src="/bower_components/bootstrap-select/dist/js/bootstrap-select.js" charset="utf-8"></script>
    <script src="/bower_components/bootstrap-fileinput/js/fileinput.js" charset="utf-8"> </script>
    <script src="/bower_components/bootstrap-fileinput/js/locales/pt.js" charset="utf-8"> </script>
@endpush
