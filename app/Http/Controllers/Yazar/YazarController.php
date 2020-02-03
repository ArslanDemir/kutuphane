<?php

namespace App\Http\Controllers\Yazar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class YazarController extends Controller{
	
	function show(){
		return view('yazar/liste',[
			'yazarlar' => $this->yazarListesi()
		]);
	}
	function ekle(Request $request){
		if ($request->method() == 'POST') {
			$this->yazarEkle($request->input());
			return redirect('yazarlar');
		}else{
			return view('yazar/ekle',[
				'uyruklar' => $this->uyrukListesi()]);
		}
	}
	function duzenle(Request $request, $id){
		if ($request->method() == 'POST') {
			var_dump($request->input());
			$this->yazarDuzenle($request->input(),$id);
			return redirect('yazarlar');
		}
		return view('yazar/duzenle',[
			'yazar' => $this->yazarBul($id),
			'uyruklar' => $this->uyrukListesi()
		]);
	}
	function sil($id){
		if ($this->yazarBul($id)) {
			$this->yazarSil($id);
		}
		return redirect('yazarlar');
	}
	function yazarBul($id){
		return $yazar = DB::table('yazar')->where('yazar.id','=',$id)->first(); 
	}
	function yazarListesi(){
		return $yazarlar = DB::table('yazar')->leftjoin('uyruk','yazar.uyruk','=','uyruk.id')->select('yazar.*','uyruk.uyruk')->get();
	}

	function yazarEkle($data){
		return $yazar =  DB::table('yazar')->insertGetId([
			'isim' => $data['isim'],
			'uyruk' => $data['uyruk']
		]);
	}
	function uyrukListesi(){
		return $uyruklar = DB::table('uyruk')->get();
	}
	function yazarSil($id){
		return $yazar = DB::table('yazar')->where('id','=',$id)->delete();
	}
	function yazarDuzenle($data,$id){
		return $yazar = DB::table('yazar')->where('id','=',$id)->update([
			'isim' => $data['isim'],
			'uyruk' => $data['uyruk']
		]);
	}
}