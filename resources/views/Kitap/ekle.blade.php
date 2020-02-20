@extends('sablonicerik')

@section('baslik','Kitap Ekle')
@section('icerik')
<div class="col-5">
    <div class="form-group">
        <label>ISBN KODU</label>
        <input class="form-control" type="text" name="isbn">
    </div>
    <div class="form-group">
        <button class="form-control">ARA</button>
    </div>
</div>
<hr>
<div class="col-5">
    <form method="POST" action="{{URL::to('/kitap/ekle')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label>Kitap İsmi</label>
            <input type="text" name="isim" class="form-control">
        </div>
        @isset($yazarlar)
        <div class="form-group">
            <label>Yazar</label>
            <select name="yazar" class="form-control">
                @foreach($yazarlar as $yazar)
                <option value="{{$yazar->id}}">{{$yazar->isim}}</option>
                @endforeach
            </select>
        </div>
        @endisset
        @isset($kategoriler)
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                @foreach($kategoriler as $kategori)
                <option value="{{$kategori->id}}">{{$kategori->isim}}</option>
                @endforeach
            </select>
        </div>
        @endisset
        @isset($durumlar)
        <div class="form-group">
            <label>Durum</label>
            <select name="durum" class="form-control">
                @foreach($durumlar as $durum)
                <option value="{{$durum->id}}">{{$durum->durum}}</option>
                @endforeach
            </select>
        </div>
        @endisset
        <div class="form-group">
            <label>Fotoğraf</label>
            <input type="file" name="resim" id="resim" class="form-control">
        </div>
        <button class="btn btn-success form-control">Kaydet</button>
        @csrf
    </form>
</div>
@endsection