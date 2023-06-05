@extends('back.layouts.master')
@section('title','Tum Odevler')
@section('content')

    <div class="card shadow mb-4" >
        <div class="card-header py-3" >
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            <h6 class="m-0 font-weight-bold float-right text-primary"><strong> {{$messages->count()}} </strong> veri bulundu </h6>
        </div>
        <div class="card-body md-16">
            <div class="table-responsive" width="100%" style="text-align-all:center;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>Email</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th>Olustugu Tarih</th>
                        <th>Durum</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>

                            <td>{{$message->id}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->topic}}</td>
                            <td>{{$message->message}}</td>
                            <td>{{$message->created_at->diffForHumans()}}</td>

                            <td>
                                <input class="switch" message-id="{{$message->id}}" type="checkbox" data-on="Okunduu" data-off="Okunmadıı" data-onstyle="success" data-offstyle="danger" @if($message->status==1) checked
                                       @endif data-toggle="toggle">
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
                id = $(this)[0].getAttribute('message-id');
                statu=$(this).prop('checked');
                $.get("{{route('admin.message.switch')}}", {id:id,statu:statu},  function(data, status) {});
            })
        })
    </script>
@endsection
