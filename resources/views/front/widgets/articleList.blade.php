
@if(count($articles)>0)
@foreach($articles as $article)
    <div class="post-preview">
        <a href="{{route('single', [$article->getCategory->slug,$article->slug])}}"> <h2 class="post-title">{{$article->title}}</h2>

            <img  src="{{$article->image}} "width="300" height="400">

            <h4 class="post-subtitle" >{!!str_limit($article->content,75) !!}</h4>

        </a>

        <p class="post-meta"> Kategori:
            <a href="#">{{$article->getCategory->name}}</a>
        <p> <span class="float-right">{{$article->created_at->diffForHumans()}}</span></p>
        </p>
    </div>
    @if(!$loop->last)
        <hr class="my-4" />
    @endif
@endforeach
<div class="float-center">

    {{$articles->links()}}

</div>
@else
    <div class="alert alert-danger">
        <h1>Bu kategoriye ait yazi bulunamadi.</h1>
    </div>
@endif
