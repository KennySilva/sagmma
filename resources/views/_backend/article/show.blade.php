@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">

    <style media="screen">
    #exTab2 h3 {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }
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
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Artigos</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="exTab2" class="">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a  href="#1" data-toggle="tab">ARTIGOS</a>
                            </li>
                            <li><a href="#2" data-toggle="tab">CATEGORIAS</a>
                            </li>
                            <li><a href="#3" data-toggle="tab">MARCADORES</a>
                            </li>

                        </ul>

                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <br>
                                {{ csrf_field() }}
                                <!------------------------------------------------------------------------------------->
                                <show-article></show-article>
                                <!------------------------------------------------------------------------------------->
                            </div>
                            <div class="tab-pane" id="2">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                <show-category></show-category>
                                <!------------------------------------------------------------------------------------->
                            </div>
                            <div class="tab-pane" id="3">
                                <br>
                                <!------------------------------------------------------------------------------------->
                                <show-tag></show-tag>
                                <!------------------------------------------------------------------------------------->
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
