<div class="list-group">
    <a href="#" class="list-group-item active">Categorias</a>
    @foreach ($categories as $category)
        <a href="{{ route('front.search.category', $category->name) }}" class="list-group-item"><span class="badge">{{ $category->articles->count() }}</span> {{ $category->name }}</a>
    @endforeach
</div>
<div class="panel panel-default">
    <div class="panel-heading ">
        <h3>Tags</h3>
    </div>
    <div class="panel-body">
        @foreach ($tags as $tag)
            <span class="label label-info">
                <a href = "{{ route('front.search.tag', $tag->name) }}">
                    {{ $tag->name }}
                </a>
            </span>&nbsp;
        @endforeach
    </div>
</div>



<h4>Artigos Em Destaque</h4>
@foreach ($featuresArticle as $article)
<a href="{{route('front.view.article', $article->slug)}}" class="list-group-item">
    <h4 class="list-group-item-heading">{{$article->title}}</h4>
    {{-- <p class="list-group-item-text">
        Aliquip aliqua laboris eu et tempor officia dolor aliquip.
    </p> --}}
</a>
@endforeach
