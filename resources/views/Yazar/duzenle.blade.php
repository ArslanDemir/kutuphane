@extends('sablonicerik')

@section('baslik','Yazar Ekle')
@section('icerik')

<hr>
<div class="col-5">
    <form action="{{URL::to('/yazar/duzenle/'.$yazar->id)}}" method="POST">
        <div class="form-group">
            <label>Yazar İsmi</label>
            <input type="text" name="isim" value="{{$yazar->isim}}" class="form-control">
        </div>
        @isset($uyruklar)
        <div class="form-group">
            <label>Uykuk</label>
            <select name="uyruk" class="form-control">
                @foreach($uyruklar as $uyruk)
                    @if($yazar->uyruk == $uyruk->id)
                        <option selected="" value="{{$uyruk->id}}">{{$uyruk->uyruk}}</option>
                    @else
                        <option value="{{$uyruk->id}}">{{$uyruk->uyruk}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @endisset
        <button class="btn btn-success form-control">Kaydet</button>
        @csrf
    </form>
</div>
@endsection