@extends('back.layouts.master')
@section('title','Tum Odevler')
@section('content')

    <div class="card shadow mb-4" >
        <div class="card-header py-3" >
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            <h6 class="m-0 font-weight-bold float-right text-primary"><strong> {{$articles->count()}} </strong> veri bulundu </h6>
        </div>
        <div class="card-body md-16">
            <div class="table-responsive" width="100%" style="text-align-all:center;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Odev Baslıgı</th>
                        <th>Kategori</th>
                        <th>Görüntülenme Sayısı</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Durum</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>
                            <img src="{{asset($article->image)}}" width="200">
                        </td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->getCategory->name}}</td>
                        <td>{{$article->hit}}</td>
                        <td>{{$article->created_at->diffForHumans()}}</td>
                        <td>
                            <input class="switch" article-id="{{$article->id}}" type="checkbox" data-on="Aktiff" data-off="Bitti" data-onstyle="success" data-offstyle="danger" @if($article->status==1) checked
                                   @endif data-toggle="toggle" style="font-size : 20px; width: 100%; height: 100px; text-align-all: center; "  >
                        </td>                       <td>
                            <a href="#" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Görüntüle </a>
                            <a href="{{route('admin.odevler.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> Düzenle </a>
                            <a href="{{route('admin.destroy',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Sil </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>

@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switch').change(function() {
                id = $(this)[0].getAttribute('article-id');
                statu=$(this).prop('checked');
                $.get("{{route('admin.switch')}}", {id:id,statu:statu},  function(data, status) {});
            })
        })
    </script>
@endsection
