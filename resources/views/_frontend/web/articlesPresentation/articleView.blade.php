@extends('_frontend.master.app')

@section('front-style')
    {{-- <link rel="stylesheet" href="/css/front/front.css" media="screen" title="no title"> --}}

<style media="screen">
    body {
        padding-top: 100px;
        padding-left: : 20px;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid">
            <section class="col-md-9 posts ">
                <h3 class="text-center">{!! $article->title !!}</h3>
                <hr>
                <article class="article">
                        <p>{!! $article->content !!}</p>
                    <br>
                    <h3>Comentários</h3>
                    <hr>
                        <div id="disqus_thread"></div>
                        <script>
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://sagmma.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Por favor Ative JavaScript no seu Browser para ver isto <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </article>
        </section>
        <aside class="col-md-3 hidden-xs hidden-sm">
            @include('_frontend.master.partials.asideNews')
        </aside>
</div>


@endsection

@push('scripts')

    <script type="text/javascript">

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
