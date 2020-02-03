@extends('sablonicerik')

@section('baslik','Kitap Ekle')
@section('icerik')
<div class="col-5">
    <form method="POST" action="{{URL::to('/kitap/duzenle/'.$kitap->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <label>Kitap İsmi</label>
            <input type="text" name="isim" class="form-control" value="{{$kitap->isim}}">
        </div>
        @isset($yazarlar)
        <div class="form-group">
            <label>Yazar</label>
            <select name="yazar" class="form-control">
                @foreach($yazarlar as $yazar)
                @if($kitap->yazar == $yazar->id)
                <option selected="" value="{{$yazar->id}}">{{$yazar->isim}}</option>
                @else 
                <option value="{{$yazar->id}}">{{$yazar->isim}}</option>
                @endif
                @endforeach
            </select>
        </div>
        @endisset
        @isset($kategoriler)
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                @foreach($kategoriler as $kategori)
                    @if($kitap->kategori == $kategori->id)
                        <option selected="" value="{{$kategori->id}}">{{$kategori->isim}}</option>
                    @else
                        <option value="{{$kategori->id}}">{{$kategori->isim}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @endisset
        @isset($durumlar)
        <div class="form-group">
            <label>Durum</label>
            <select name="durum" class="form-control">
                @foreach($durumlar as $durum)
                    @if($kitap->durum == $durum->id)
                        <option selected="" value="{{$durum->id}}">{{$durum->durum}}</option>
                    @else
                        <option value="{{$durum->id}}">{{$durum->durum}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @endisset
        <div class="form-group">
            <label>Fotoğraf</label><br/>
            <img src="{{asset('storage/img/'.$kitap->resim.'')}}">
            <input type="file" name="resim" class="form-control">
        </div>
        <input type="hidden" name="oldImage" value="{{$kitap->resim}}">
         <button class="btn btn-success form-control">Düzenlemeyi Kaydet</button>
    </form>
</div>
@endsection