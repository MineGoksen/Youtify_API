<?php

use App\Http\Controllers\ControllerNew;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    //return view('welcome');//view klasoru icinde welcome isimli dosyayi ekranda cikti olarak goster
    return redirect()->route('category.show', ['name' => 'isim']);// buna yonlendiriyor
});

Route::prefix('gruplama')->group(function () {

    Route::get('/merhaba', function () {
        return "Merhaba";
    });
    Route::get('/json', function () {
        return ['message' => 'merhaba API'];//json object olarak doner
    });
    Route::get('/response', function () {
        return response(['message' => 'merhaba API'], 200)
            ->header('Content-Type', 'application/json');
    });
});

Route::get('/response-json', function () {
    return response()->json(['message' => "merhaba api"]);//content type'i application json olur otomatik
});
Route::get('/product/{id}/{type}', function ($id, $r_type) {//parametre kullanimi
    return response()->json(['message' => "merhaba $id ve $r_type"]);
});
Route::get('/product/{id}/{type?}', function ($id, $r_type = 'anonim') {//type  opsiyonel
    return response()->json(['message' => "merhaba $id ve $r_type"]);
});
Route::get('/category/{name}', function ($name) {
    return $name;
})->name('category.show');

Route::get('/new/{id}',[ControllerNew::class,'show']);//laravel 8 de boyle yapiliyor
