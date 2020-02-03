@extends('sablonicerik')

@section('baslik','Kişi Ekle')
@section('icerik')

<hr>
<div class="col-5">
    <form action="{{URL::to('/kisi/ekle')}}" method="POST">
        <div class="form-group">
            <label>İsim-Soyisim</label>
            <input type="text" name="isim" class="form-control">
        </div>
        <div class="form-group">
            <label>E-Posta</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Telefon</label>
            <input type="tel" maxlength="11" name="tel" class="form-control">
        </div>
        <button class="btn btn-success form-control">Kaydet</button>
        @csrf
    </form>
</div>
@endsection