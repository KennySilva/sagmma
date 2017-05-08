@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">

    </style>

@endsection

@section('htmlheader_title')
    Artigos
@endsection

@section('contentheader_title')
    Artigos
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabArt" data-toggle="tab">ARTIGOS</a></li>
                            <li><a href="#tabCat" data-toggle="tab">CATEGORIAS</a></li>
                            <li><a href="#tabMar" data-toggle="tab">MARCADORES</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            {{ csrf_field() }}

                            <div class="tab-pane fade in active" id="tabArt">
                                <show-article></show-article>
                            </div>

                            <div class="tab-pane fade" id="tabCat">
                                <show-category></show-category>
                            </div>

                            <div class="tab-pane fade" id="tabMar">
                                <show-tag></show-tag>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script src="/bower_components/trumbowyg/dist/trumbowyg.js" charset="utf-8"></script>
        <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
        <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
        <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>

        <script>
        $("#articleimage").fileinput({
            language: "pt",
            showUpload: false,
            allowedFileExtensions: ["jpg", "png", "gif"],
            theme: "gly",
        });
        $('.textarea-content').trumbowyg();
        </script>
    @endpush
