@extends('sablonicerik')

@section('baslik','Kişi Listesi')
@section('icerik')
<div class="row-fluid">
            <div class="col" align="center">
                
            <a href="kisi/ekle" class="btn btn-success">Kişi Ekle</a>
            </div>
        </div>
    <div class="col" style="margin-top: 20px">
        @isset($kisiler)
        <ul class="list-group">
        @foreach($kisiler as $kisi)
            <li class="list-group-item">
                <div class="col-1 float-left">
                        @if($kisi->durum == 1)
                        Aktif
                        @else
                        Yasaklı
                        @endif
                </div>
                <div class="col-5 float-left">
                    <b>
                    {{$kisi->isim}}     
                    </b>
                </div>
                <div class="col-2 float-left">
                    {{$kisi->email}}
                </div>
                <div class="col-2 float-left">
                    {{$kisi->telefon}}
                </div>
                <div class="col-1 float-left"> <a href="{{URL::to('/kisi/duzenle/'.$kisi->id)}}" class="btn btn-warning btn-sm">Düzenle</a></div>
                <div class="col-1 float-left"> <a href="{{URL::to('/kisi/sil/'.$kisi->id)}}" class="btn btn-danger btn-sm">Sil</a></div>
            </li>    
        @endforeach
        </ul>
    @endisset
    </div>
@endsection

