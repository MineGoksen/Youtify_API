<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ControllerNew;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

/*
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

Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/{id}', function ($id) {//parametre kullanimi
    //return view('product',['id'=>$id]);
    return view('product',compact('id'));//compact ile esitlemeye egerek kalmiyor
   // return view('product',with('id',$id))->with('name',$name);  boyle de kullanabilirsin
});*/


Route::get('/lists/{id}', [ListController::class,'getLists']);
Route::get('/getComment/{song_id}', [SongController::class,'getComments']);
Route::get('/getLikes/{song_id}', [SongController::class,'getLikeNum']);

Route::post('listAdd',[ListController::class,'addLists']);
Route::post('listDelete',[ListController::class,'deleteLists']);
Route::post('listSongs',[ListController::class,'getListSongs']);
Route::post('userAdd',[RegisterController::class,'signUp']);
Route::post('login',[RegisterController::class,'logIn']);
Route::post('addComment',[SongController::class,'addComment']);
Route::post('song_like',[SongController::class,'addLike']);
Route::post('song',[SongController::class,'song']);
Route::post('search',[SearchController::class,'search']);

/*
Route::get('/setUserList', function () {
    //UserModel::query()->create()
    $model = new User();
    $model->email = "maksimumm@gmail.com";
    $model->password = Faker\Provider\Uuid::uuid();
    $model->first_name = Faker\Provider\Person::firstNameFemale();
    $model->last_name = "Kurtuluş";
    $model->id_number = 423239862714;
    $model->save();
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
});*/

/*
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
});*/
