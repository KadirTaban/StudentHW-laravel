@extends('back.layouts.master')
@section('title','Tum Kategoriler')
@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Yeni Kategori Olustur </h6>

            </div>
            <div class="card-body">
                blabla
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> @yield('title') </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Odev Sayisi</th>
                            <th>Durum</th>
                            <th>Görüntülenme Sayısı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Durum</th>
                            <th>Islemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>

                                <td>{{$article->title}}</td>
                                <td>
                                    <input class="switch" article-id="{{$article->id}}" type="checkbox" data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger" @if($article->status==1) checked
                                           @endif data-toggle="toggle">
                                </td>                        <td>
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
</div>
@endsection

