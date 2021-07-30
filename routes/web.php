<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ControllerNew;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    //return view('welcome');//view klasoru icinde welcome isimli dosyayi ekranda cikti olarak goster
    return redirect()->route('category.show', ['name' => 'isim']);// buna yonlendiriyor
});
Route::match(['get', 'post'], '/neresi', function () {
    return "burasi neresi";
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

Route::get('/product/{id}', [ProductController::class, 'show']);
/*Route::get('/product/{id}', function ($id) {//parametre kullanimi
    //return view('product',['id'=>$id]);
    return view('product',compact('id'));//compact ile esitlemeye egerek kalmiyor
   // return view('product',with('id',$id))->with('name',$name);  boyle de kullanabilirsin
});*/


Route::get('/product/{id}/{type}', function ($id, $r_type) {//parametre kullanimi
    return response()->json(['message' => "merhaba $id ve $r_type"]);
});
Route::get('/product/{id}/{type?}', function ($id, $r_type = 'anonim') {//type  opsiyonel
    return response()->json(['message' => "merhaba $id ve $r_type"]);
});
Route::get('/category/{name}', function ($name) {
    return $name;
})->name('category.show');

Route::get('/new/{id}', [ControllerNew::class, 'show']);//laravel 8 de boyle yapiliyor

Route::group(['namespace' => 'Controllers', 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'show']);
});


////////////////////////////////////////////////////////////////////
Route::get('/users', function () {
    $users = \Illuminate\Support\Facades\DB::table('users')->get();
    $first_user = \Illuminate\Support\Facades\DB::table('users')->first();
    $filtered = \Illuminate\Support\Facades\DB::table('users')->pluck('email', 'name');
    $chunked = \Illuminate\Support\Facades\DB::table('users')
        ->orderBy('id')
        ->chunk(3, function ($users) {
//chunk ucerli gruplar halinde geliyor

        });
    dd($first_user);//ekrana bastirmak icin
});
