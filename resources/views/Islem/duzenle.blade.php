@extends('sablonicerik')

@section('baslik','Yazar Ekle')
@section('icerik')

<hr>
<div class="col-5">
    <form action="{{URL::to('/islem/duzenle/'.$islem->id)}}" method="POST">
        @isset($kitaplar)
        <div class="form-group">
            <label>Kitap</label>
            <select name="kitap" class="form-control">
            @foreach($kitaplar as $kitap)
                @if($kitap->id == $islem->kitap_id)
                    <option selected="" value="{{$kitap->id}}">{{$kitap->isim}}</option>
                @else
                    <option value="{{$kitap->id}}">{{$kitap->isim}}</option>
                @endif
            @endforeach
            </select>
        </div>
        @endisset
        @isset($kisiler)
        <div class="form-group">
            <label>Kişi</label>
            <select name="kisi" class="form-control">
            @foreach($kisiler as $kisi)
                @if($kisi->id == $islem->kisi_id)
                    <option selected="" value="{{$kisi->id}}">{{$kisi->isim}}</option>
                @else
                    <option value="{{$kisi->id}}">{{$kisi->isim}}</option>
                @endif
            @endforeach
            </select>
        </div>
        @endisset
        <div class="form-group">
            <label>İşlem</label>
            <select name="islem" class="form-control">
                <option value="1">Ödünç Aldı</option>
                <option value="2">Teslim Etti</option>
            </select>
        </div>
        <button class="btn btn-success form-control">Kaydet</button>
        @csrf
    </form>
</div>
@endsection