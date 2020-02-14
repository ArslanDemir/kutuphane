<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Controller@showMain');

Route::get('kitaplar','Kitap\KitapController@show');

Route::get('kitap/ekle','Kitap\KitapController@ekle');
Route::post('kitap/ekle','Kitap\KitapController@ekle');

Route::get('kitap/duzenle/{id}','Kitap\KitapController@duzenle');
Route::post('kitap/duzenle/{id}','Kitap\KitapController@duzenle');

Route::get('kitap/sil/{id}','Kitap\KitapController@sil');

Route::get('yazarlar','Yazar\YazarController@show');
Route::get('yazar/ekle','Yazar\YazarController@ekle');
Route::post('yazar/ekle','Yazar\YazarController@ekle');

Route::get('yazar/duzenle/{id}','Yazar\YazarController@duzenle');
Route::post('yazar/duzenle/{id}','Yazar\YazarController@duzenle');

Route::get('yazar/sil/{id}','Yazar\YazarController@sil');


Route::get('kisiler','Kisi\KisiController@show');
Route::get('kisi/ekle','Kisi\KisiController@ekle');
Route::post('kisi/ekle','Kisi\KisiController@ekle');

Route::get('kisi/duzenle/{id}','Kisi\KisiController@duzenle');
Route::post('kisi/duzenle/{id}','Kisi\KisiController@duzenle');

Route::get('kisi/sil/{id}','Kisi\KisiController@sil');


Route::get('islemler','Islem\IslemController@show');

Route::get('islem/ekle','Islem\IslemController@ekle');
Route::post('islem/ekle','Islem\IslemController@ekle');

Route::get('islem/duzenle/{id}','Islem\IslemController@duzenle');
Route::post('islem/duzenle/{id}','Islem\IslemController@duzenle');

Route::get('islem/sil/{id}','Islem\IslemController@sil');