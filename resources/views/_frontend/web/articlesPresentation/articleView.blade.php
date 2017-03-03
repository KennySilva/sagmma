@extends('_frontend.master.app')

@section('front-style')
<style media="screen">
body{
    padding-top: 50px;
}
</style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="main container">
                <section class="col-md-9 posts ">
                    <h3 class="text-center">{!! $article->title !!}</h3>
                    <hr>
                    <article class="article">
                        <div class="row">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <br>
                        <h3>Comentários</h3>
                        <hr>
                        <div class="row">
                            <div id="disqus_thread"></div>
                            <script>
                            (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://sagmma.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </article>
            </section>
            <aside class="col-md-3 hidden-xs hidden-sm">
                @include('_frontend.master.partials.asideNews')
            </aside>
        </section>
    </div>

</div>


@endsection
