<?php

namespace App\Http\Controllers\Kisi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KisiController extends Controller{
	
	function show(){
		$kisiler = $this->kisiListesi();
		return view('kisi/liste',['kisiler' => $kisiler]);
	}
	function ekle(Request $request){
		if ($request->method() == 'POST') {
			echo "<pre>";
			print_r($request->input());
			echo "</pre>";
			$this->kisiEkle($request->input());
			return redirect('kisiler');
		}else{
			return view('kisi/ekle');
		}
	}
	function duzenle(Request $request,$id){
		if ($request->method() == 'POST') {
			$this->kisiDuzenle($request->input(),$id);
			return redirect('kisiler');
		}else{
			return view('kisi/duzenle',['kisi'=>$this->kisiBul($id)]);
		}
	}
	function sil($id){
		if ($this->kisiBul($id)) {
			$this->kisiSil($id);
		}
		return redirect('kisiler');
	}

	function kisiBul($id){
		return $kisi = DB::table('kisi')->where('id','=',$id)->first();
	}
	function kisiListesi(){
		return $kisiler = DB::table('kisi')->get();
	}
	function kisiEkle($data){
		return $kisi = DB::table('kisi')->insertGetId([
			'isim' => $data['isim'],
			'telefon' => $data['tel'],
			'email' => $data['email'],
			'durum' => 1
		]);
	}
	function kisiDuzenle($data,$id){
		return $duzenle = DB::table('kisi')->where('id','=',$id)->update([
			'isim' => $data['isim'],
			'telefon' => $data['tel'],
			'email' => $data['email'],
			'durum' => $data['durum']
		]);
	}
	function kisiSil($id){
		$kisi = DB::table('kisi')->where('id','=',$id)->delete();
	}
}