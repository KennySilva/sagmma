@extends('_backend.master.app')
@section('sagmma-style')
    <link rel="stylesheet" href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css') }}" media="screen" title="no title" charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}" media="screen" title="no title" charset="utf-8">

@endsection

@section('htmlheader_title')
    Imagens
@endsection

@section('contentheader_title')
    Imagens
@endsection

@section('main-content')
    <div class="sagmma_container">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Imagens</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="row">
                        @foreach ($images as $image)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">

                                    <img src="/uploads/uploadsImages/articles/{{$image->name}}" alt="...">


                                    {{-- <a href="/uploads/uploadsImages/articles/{!!$image->name!!}" data-lightbox="photo-1" data-title="Um Mercado com capacidade"><img src="/uploads/uploadsImages/articles/{!!$image->name!!}" alt=""></a> --}}
                                    {{-- <a href="http://lorempixel.com/200/200" data-lightbox="photo-1" data-title="Um Mercado com capacidade"><img src="http://lorempixel.com/200/200" alt=""></a> --}}



                                    <div class="caption">
                                        <h3>{{$image->article->title}}</h3>
                                        <hr>
                                        {{-- <p><a href="/uploads/uploadsImages/articles/{{$image->name}}" data-lightbox="photo-2" data-title="{{$image->article->title}}"><i class="fa fa-eye"></i></a></p> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>





    @endsection
    @push('scripts')
        <script src="/bower_components/trumbowyg/dist/trumbowyg.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" charset="utf-8"> </script>
        <script src="{{ asset('bower_components/bootstrap-fileinput/js/locales/pt.js') }}" charset="utf-8"> </script>
        <script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" charset="utf-8"> </script>

        <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel':	"Imagem %1 of %3"
        });

        $("#articleimage").fileinput({
            language: "pt",
            showUpload: false,
            allowedFileExtensions: ["jpg", "png", "gif"],
            theme: "gly",
        });
        $('.textarea-content').trumbowyg();
        </script>
    @endpush
