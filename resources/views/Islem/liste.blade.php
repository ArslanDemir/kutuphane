@extends('sablonicerik')

@section('baslik','Yazar Listesi')
@section('icerik')
        <div class="row-fluid">
            <div class="col" align="center">
                
            <a href="islem/ekle" class="btn btn-success">İşlem Ekle</a>
            </div>
        </div>
    <div class="col" style="margin-top: 20px">
        @isset($islemler)
        <ul class="list-group"> 
        @foreach($islemler as $islem)
            <li class="list-group-item">                
                <div class="col-3 float-left">
                   {{$islem->kitap}} 
                   
                </div>
                <div class="col-3 float-left">
                    <b>{{$islem->kisi}}</b>
                </div>
                <div class="col-2 float-left">
                    @if($islem->islem == 1)
                    Teslim Aldı
                    @else
                    Teslim Etti
                    @endif    
                </div>
                <div class="col-2 float-left">
                    {{$islem->tarih}}
                </div>
                <div class="col-1 float-left">
                    <a href="{{URL::to('islem/duzenle/'.$islem->id)}}" class="btn btn-warning btn-sm">Düzenle</a></div>
                <div class="col-1 float-left">
                    <a href="{{URL::to('islem/sil/'.$islem->id)}}" class="btn btn-danger btn-sm">Sil</a></div>
            </li>
        @endforeach
        </ul>
    @endisset
    </div>
@endsection