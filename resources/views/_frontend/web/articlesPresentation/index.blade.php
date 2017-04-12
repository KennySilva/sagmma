@extends('_frontend.master.app')

@section('front-style')
<style media="screen">

#custom_carousel .item {

    color:#000;
    background-color:#fff;
    padding:20px 20px;
}

#custom_carousel .controls li.active {
    background-color:#fff;
    border-bottom:3px solid #3495E6;
}
#custom_carousel .controls{
    overflow-x: auto;
    overflow-y: hidden;
    padding:0;
    margin:0;
    white-space: nowrap;
    text-align: center;
    position: relative;
    background:#eee
}


#custom_carousel .controls li {
    display: table-cell;
    width: 1%;
    max-width:90px
}
#custom_carousel .controls a small {
    overflow:hidden;
    display:block;
    font-size:10px;
    margin-top:5px;
    font-weight:bold
}
</style>

@endsection

@section('content')
    <div class="row">
        {{-- <div class="page-header">
        <div class="container">
        <h1 class="text-center">Portal de Notícia do Concelho de Santa Catarina</h1>
        <h5 class="text-center">Corração da Ilha de Santiago</h5>

    </div>
</div> --}}


<div class="jumbotron">
    <h1 class="text-center">Santa Catarina</h1>
    <h5 class="text-center">Corração de Santiago</h5>
</div>

@include('_frontend.master.partials.caroucelNews')
</div>
<br>
<br>
<div class="row">
    <div class="col-md-12">

        <section  class="main">
            <div class="row">
                <section  class="posts col-md-9">
                    <div class="miga-de-pan">
                        <ol  class="breadcrumb">
                            <li class=""><a href="#">Home</a></li>
                            <li class=""><a href="#">Categprias</a></li>
                            <li class="">Disenho Web</li>
                        </ol>
                    </div>


                    @foreach ($articles as $article)
                        <article class="post clearfix">

                            <a href="{{ route('front.view.article', $article->slug) }}" class="thumb pull-left">
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
    });


    </script>
@endpush
