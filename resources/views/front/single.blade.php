@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
    <div class="col-md-9 mx-auto">
        {!! $article->content  !!}
        <span class="text-danger"> Okunma Sayisi: <b> {{$article->hit}}</b> </span>
    </div>
    @include('front.widgets.categoryWidget')
@endsection
