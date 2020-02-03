@extends('sablonicerik')

@section('baslik','Yazar Ekle')
@section('icerik')

<hr>
<div class="col-5">
    <form action="{{URL::to('/kisi/duzenle/'.$kisi->id)}}" method="POST">
        <div class="form-group">
            <label>İsim-Soyisim</label>
            <input type="text" name="isim" class="form-control" value="{{$kisi->isim}}">
        </div>
        <div class="form-group">
            <label>E-Posta</label>
            <input type="email" name="email" class="form-control" value="{{$kisi->email}}">
        </div>
        <div class="form-group">
            <label>Telefon</label>
            <input type="tel" maxlength="11" name="tel" class="form-control" value="{{$kisi->telefon}}">
        </div>
        <div class="form-group">
            <select name="durum" class="form-control">
                @if($kisi->durum == 1)
                <option selected="" value="1">Aktif</option>
                <option value="2">Yasaklı</option>
                @elseif($kisi->durum == 2)
                <option value="1">Aktif</option>
                <option selected="" value="2">Yasaklı</option>
                @else
                @endif
            </select>
        </div>
        <button class="btn btn-success form-control">Kaydet</button>
        @csrf
    </form>
</div>
@endsection