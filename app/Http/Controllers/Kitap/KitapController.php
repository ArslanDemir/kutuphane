<?php

namespace App\Http\Controllers\Kitap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KitapController extends Controller{
	
	function show(){
		$kitaplar = $this->kitapListesi();
		return view('kitap/liste',[
			'kitaplar' => $kitaplar,
			'durumlar' => $this->durumListesi(),
			'kategoriler' => $this->kategoriListesi()
		]);
	}

	function ekle(Request $request){
		if ($request->method() == 'POST') {
			if (!empty($request->file('resim')) && $resim = $this->uploadImage($request->file('resim')) ) {
				$this->kitapEkle($request->input(),$resim);
				return redirect('kitaplar');
			}else{
				$resim = NULL;
				$this->kitapEkle($request->input(),$resim);
				return redirect('kitaplar');
			}
		}else{
			return view('kitap/ekle',[
				'kategoriler' => $this->kategoriListesi(),
				'durumlar' => $this->durumListesi(),
				'yazarlar' => $this->yazarListesi()
			]);
		}
	}

	function sil($id){
		if ($this->kitapBul($id)) {
			$this->kitapSil($id);
		}
		return redirect('kitaplar');
	}

	function duzenle(Request $request,$id){
		$kitap = $this->kitapBul($id);
		if ($request->method() == "POST") {
			if (!empty($request->file('resim')) && $resim = $this->uploadImage($request->file('resim')) ) {
				echo "resim değişti";
			}else{
				echo "resim değişmedi";
				$resim = 0;
				$resim = $request->input('oldImage');
				var_dump($resim);
			}
			$this->kitapDuzenle($request->input(),$resim,$id);
			
			return redirect('kitaplar');
		}else{

			return view('kitap/duzenle',[
				'kitap'=>$kitap,
				'kategoriler' => $this->kategoriListesi(),
				'durumlar' => $this->durumListesi(),
				'yazarlar' => $this->yazarListesi()
			]);
		}
		//return view('kitap/duzenle',['kitap'=>$kitap]);
	}


	function kitapEkle($data,$resim){
		$ekle = DB::table('kitap')->insertGetId([
			'isim' => $data['isim'],
			'yazar' => $data['yazar'],
			'kategori' => $data['kategori'],
			'durum' => $data['durum'],
			'okundu' => 0,
			'resim' => $resim
		]);
		if ($ekle) {
			echo "basarılı";
		}else{
			echo 'basarısız';
		}
	}

	function kitapDuzenle($data,$resim,$id){
		$duzenle = DB::table('kitap')->where('id','=',$id)->update([
			'isim' => $data['isim'],
			'yazar' => $data['yazar'],
			'kategori' => $data['kategori'],
			'durum' => $data['durum'],
			'okundu' => 0,
			'resim' => $resim
		]);
		if ($duzenle) {
			echo "basarılı";
		}else{
			echo 'basarısız';
		}
	}


	function uploadImage($file){
		if ($file->isValid()) {
			$resim = $file->getClientOriginalName();
			
			if ( $path = $file->storeAs('public/img',$resim) ) {
				return $resim;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function kitapBul($id){
		return $kitap = DB::table('kitap')->where('id','=',$id)->first();
	}
	function kitapSil($id){
		$kitap = DB::table('kitap')->where('id','=',$id)->delete();
	}
	function kitapListesi(){
		return $kitaplar = DB::table('kitap')->join('yazar','kitap.yazar','=','yazar.id')->select('kitap.*','yazar.isim as yazar')->get();
	}
	function kategoriListesi(){
		return $kategoriler = DB::table('kategori')->get();
	}
	function durumListesi(){
		return $durumlar = DB::table('durum')->get();
	}
	function yazarListesi(){
		return $yazarlar = DB::table('yazar')->get();
	}
}