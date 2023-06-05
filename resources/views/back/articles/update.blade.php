@extends('back.layouts.master')
@section('title',$article->title.'odevini guncelle')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{route('admin.odevler.update', $article->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Odev Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$article->title}}" ></input>
                </div>
                <div class="form-group">
                    <label>Odev Kategori</label>
                    <select class="form-control" name="category" >
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                            <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Odev Fotoğrafı</label><br/>
                    <img src="{{asset($article->image)}}" class="img-thumbnail rounded" width="300">
                    <input type="file" name="image" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Odev İçeriği</label>
                    <textarea id="editor" name="content" class="form-control" rows="4">{!! $article->content !!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Odevi Guncelle</button>
                </div>
            </form>
        </div>
    </div>


@endsection
