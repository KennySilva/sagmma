@extends('_frontend.master.app')

@section('front-style')

@endsection

@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="jumbotron">
                <h1 class="text-center">Santa Catarina</h1>
                <h5 class="text-center">Corração de Santiago</h5>
            </div>

            @include('_frontend.master.partials.caroucelNews')
        </div> --}}
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">

                <section  class="main">
                    <div class="row">
                        <section  class="posts col-md-9">
                            @foreach ($articles as $article)
                                <article class="post clearfix">

                                    <a href="{{ route('front.view.article', $article->slug) }}" class="image-art pull-left">
                                        @foreach ($article->images as $image)
                                            <img class="img-thumbnail img-responsive" src="{{ asset('/uploads/uploadsImages/articles/'.$image->name) }}" alt="" />
                                        @endforeach
                                    </a>

                                    <h2 class="post-title">
                                        <a href="{{ route('front.view.article', $article->slug) }}">{{ $article->title }}</a>
                                    </h2>
                                    <div class="">
                                        <p>
                                            <span class="post-fecha"><i class="fa fa-folder-open-o"></i> <a href="{{ route('front.search.category', $article->category->name) }}">{{ $article->category->name }}</a> &nbsp; &nbsp;
                                                <i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans() }}</span><a href="#"></a>
                                            </p>
                                        </div>
                                        <p class="post-contenido text-justify">
                                            <div class="comment more">
                                                {{-- {!! $article->content !!} --}}
                                            </div>
                                        </p>
                                    </article>
                                @endforeach
                                <nav class="center-block">
                                    {!! $articles->render() !!}
                                </nav>

                            </section>
                            <aside class="col-md-3 hidden-xs hidden-sm">
                                @include('_frontend.master.partials.asideNews')
                            </aside>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    @endsection

    @push('scripts')
        <script type="text/javascript">
        $(document).ready(function(ev){
            $('#custom_carousel').on('slide.bs.carousel', function (evt) {
                $('#custom_carousel .controls li.active').removeClass('active');
                $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
            });

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
