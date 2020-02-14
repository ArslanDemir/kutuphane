@extends('sablonicerik')

@section('baslik','Kitap Listesi')
@section('icerik')
   
        <div class="row-fluid">
            <div class="col" align="center">
                <a href="kitap/ekle" class="btn btn-success">Kitap Ekle</a>
            </div>
        </div>
        @isset($kitaplar)
        <div class="row row-cols-2" style="margin-top: 20px">
        @foreach($kitaplar as $kitap)
            <li class="list-group-item">
                <div class="float-left">
                    <img src="{{asset('storage/img/'.$kitap->resim)}}" width="200" height="200" class="float-left">
                </div>
                <div class="float-left" style="margin-left: 20px;">
                    <h3>{{$kitap->isim}}</h3> 
                    <br/>
                    <i>Yazar : {{$kitap->yazar}}</i>
                    <br/>
                    @isset($durumlar)
                        @foreach($durumlar as $durum)
                            @if($kitap->durum == $durum->id)
                                <i>Durumu : {{$durum->durum}}</i>
                            @endif
                        @endforeach
                    <br/>
                    @endisset
                    @isset($kategoriler)
                        @foreach($kategoriler as $kategori)
                            @if($kitap->kategori == $kategori->id)
                                <i>Kategori : {{$kategori->isim}}</i>
                            @endif
                        @endforeach
                    <br/>
                    @endisset
                    <a href="kitap/duzenle/{{$kitap->id}}" class="btn btn-warning btn-sm">Düzenle</a>
                    <a href="kitap/sil/{{$kitap->id}}" class="btn btn-danger btn-sm">Kaldır</a>
                </div>
            </li>
        @endforeach
    </div>
    @endisset
@endsection