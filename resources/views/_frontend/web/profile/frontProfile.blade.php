
@extends('_frontend.master.app')

@section('front-style')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">
    <link href="{{ asset('/css/back/back.css') }}" rel="stylesheet" type="text/css"/>

    <style media="screen">
    .junb-styele {
        border-radius: 0px;
        background: #ffffff;
        border-bottom: 4px solid #7e7e7e;
        background-image: url("img/frontend_img/slide/slide_2.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: top;
        background-origin: content-box;
    }

    .text-style {
        color: #ffffff;
        text-shadow: -2px 0px 10px rgba(152, 145, 103, 1);
    }
    </style>


@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="jumbotron junb-styele">
                <div style="padding-top: 20px;" class="text-center">
                    <img class="img-responsive" src="/uploads/avatars/{!! Auth::user()->avatar !!}" alt="Placeholder" style="width: 150px; height: 150px; border-radius: 50%;">
                </div>
                <div class="text-left">
                    <h4 class="text-style"><span>@</span>{{Auth::user()->name}}</h4>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @include('_backend.master.partials.profileGeral')

            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
    <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>

    <script type="text/javascript">
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


    $(document).ready(function(ev){

        //Changing the url after click on link 'NOTICIA'
        $("#sagmma").attr("href", "/");
        $("#mmsc").attr("href", "/");
        $("#valores").attr("href", "/");
        $("#galeria").attr("href", "/");
        $("#equipa").attr("href", "/");
        $("#contactar").attr("href", "/");
        $("#myPage").attr("href", "/");
    });



    </script>
@endpush
