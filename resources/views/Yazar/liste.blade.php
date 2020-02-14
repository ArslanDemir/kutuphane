@extends('sablonicerik')

@section('baslik','Yazar Listesi')
@section('icerik')
    <div class="row-fluid">
            <div class="col" align="center">
                
            <a href="yazar/ekle" class="btn btn-success">Yazar Ekle</a>
            </div>
        </div>
    <div class="col" style="margin-top: 20px">
        @isset($yazarlar)
        <ul class="list-group">
            
        @foreach($yazarlar as $yazar)
                <li class="list-group-item">
                    <div class="col-2 float-left">
                        <b>{{$yazar->uyruk}}</b>
                    </div>
                    <div class="col-8 float-left">
                        <b>{{$yazar->isim}}</b>
                    </div>
                    <div class="col-1 float-left">
                        <a href="{{URL::to('/yazar/duzenle/'.$yazar->id)}}" class="btn btn-sm btn-warning">Düzenle</a>
                    </div>
                    <div class="col-1 float-left">
                        <a href="{{URL::to('/yazar/sil/'.$yazar->id)}}" class="btn btn-danger btn-sm">Sil</a>
                    </div>
                </li>
        @endforeach
        </ul>
    @endisset
    </div>
@endsection