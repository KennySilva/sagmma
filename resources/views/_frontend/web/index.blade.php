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


        <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>...</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>


        {{-- <div class="page-header">
            <div class="container">
                <h1 class="text-center">Portal de Notícia do Concelho de Santa Catarina</h1>
                <h5 class="text-center">Corração da Ilha de Santiago</h5>

            </div>
        </div> --}}
        @include('_frontend.master.partials.caroucelNews')
    </div>
    <br>
    <br>
    <div class="">
        <div class="col-md-12">

            {{-- <aside class="col-md-3 hidden-xs hidden-sm">
            <div class="panel panel-danger">
            <div class="panel-heading">Categorias</div>
            <div class="panel-body">
            <div class="list-group">
            <a class="list-group-item" href="#">Categoria 1</a>
            <a class="list-group-item" href="#">Categoria 2</a>
            <a class="list-group-item" href="#">Categoria 3</a>

        </div>
    </div>
</div>

<div class="panel panel-danger">
<div class="panel-heading">Marcadores</div>
<div class="panel-body">
Panel content
</div>
</div>
</aside> --}}







<section  class="container-fluid">
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
                    {{-- <a href="{{ route('front.view.article', $article->slug) }}" class="thumb pull-left"> --}}
                    @foreach ($article->images as $image)
                        <a href="#" class="thumb pull-left">

                            <img class="img-thumbnail img-responsive" src="{{ asset('/uploads/uploadsImages/articles/'.$image->name) }}" alt="" />
                        </a>
                    @endforeach
                </a>
                <h2 class="post-title">
                    <a href="">{{ $article->title }}</a>
                </h2>
                <div class="">
                    <p>
                        <span class="post-fecha"><i class="fa fa-folder-open-o"></i> <a href="">{{ $article->category->name }}</a> &nbsp; &nbsp;
                            <i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans() }} </span> &nbsp; &nbsp; <span class="post-autor"> <i class="fa fa-user" aria-hidden="true"></i></span><a href="#"></a>
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
        })
    });
    </script>
@endpush
