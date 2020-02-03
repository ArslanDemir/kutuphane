<?php

namespace App\Http\Controllers\Islem;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IslemController extends Controller{
	
	function show(){
		$islemler = $this->islemListesi();
		return view('islem/liste',['islemler' => $islemler]);
	}
	function ekle(Request $request){
		if ($request->method() == 'POST') {
			echo"<pre>";
			print_r($request->input());
			echo"</pre>";
			$this->islemEkle($request->input());
			return redirect('islemler');
		}else{
			return view('islem/ekle',[
				'kitaplar' => $this->kitapListesi(),
				'kisiler' => $this->kisiListesi()
			]);
		}
	}
	function duzenle(Request $request,$id){
		if ($request->method() == 'POST') {
			echo "<pre>";
			print_r($request->input());
			echo "</pre>";
			$this->islemDuzenle($request->input(),$id);
			return redirect('islemler');
		}else{
			return view('islem/duzenle',[
				'kitaplar' => $this->kitapListesi(),
				'islem' => $this->islemBul($id),
				'kisiler' => $this->kisiListesi()
			]);
		}
	}
	function sil($id){
		if ($this->islemBul($id)) {
			$this->islemSil($id);
			return redirect('islemler'); 
		}
	}
	function islemBul($id){
		return $islem = DB::table('islem')->where('id','=',$id)->first();
	}
	function islemListesi(){
		return $islemler = DB::table('islem')->
		join('kitap','kitap.id','=','islem.kitap_id')->
		join('kisi','kisi.id','=','islem.kisi_id')
		->select('islem.*','kisi.isim as kisi', 'kitap.isim as kitap')->get();
	}
	function islemEkle($data){
		return $islem = DB::table('islem')->insertGetId([
			'kitap_id' => $data['kitap'],
			'kisi_id' => $data['kisi'],
			'islem' => $data['islem'],
			'tarih' => date('Y-m-d')
		]);
	}
	function islemDuzenle($data,$id){
		return $islem = DB::table('islem')->where('id','=',$id)->update([
			'kitap_id' => $data['kitap'],
			'kisi_id' => $data['kisi'],
			'islem' => $data['islem']
		]);
	}
	function islemSil($id){
		return $islem = DB::table('islem')->where('id','=',$id)->delete();
	}
	function kitapListesi(){
		return $kitaplar = DB::table('kitap')->get();
	}
	function kisiListesi(){
		return $kisiler = DB::table('kisi')->get();
	}
}