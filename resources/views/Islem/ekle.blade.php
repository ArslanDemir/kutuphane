@extends('sablonicerik')

@section('baslik','İşlem Ekle')
@section('icerik')

<hr>
<div class="col-5">
    <form action="{{URL::to('/islem/ekle')}}" method="POST">
        @isset($kitaplar)
        <div class="form-group">
            <label>Kitap</label>
            <select name="kitap" class="form-control">
                @foreach($kitaplar as $kitap)
                <option value="{{$kitap->id}}">{{$kitap->isim}}</option>
                @endforeach
            </select>
        </div>
        @endisset
        @isset($kisiler)
        <div class="form-group">
            <label>Kişi</label>
            <select name="kisi" class="form-control">
                @foreach($kisiler as $kisi)
                <option value="{{$kisi->id}}">{{$kisi->isim}}</option>
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