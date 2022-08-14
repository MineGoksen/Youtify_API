<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ControllerNew;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/lists/{id}', [ListController::class,'getLists']);
Route::get('/getComment/{song_id}', [SongController::class,'getComments']);
Route::get('/songName/{song_id}', [SongController::class,'getSongName']);
Route::get('/getLikes/{song_id}', [SongController::class,'getLikeNum']);
Route::post('listAdd',[ListController::class,'addLists']);
Route::post('songAddToList',[SongController::class,'addSongToList']);
Route::post('listDelete',[ListController::class,'deleteLists']);
Route::post('listSongs',[ListController::class,'getListSongs']);
Route::post('userAdd',[RegisterController::class,'signUp']);
Route::post('login',[RegisterController::class,'logIn']);
Route::post('addComment',[SongController::class,'addComment']);
Route::post('song_like',[SongController::class,'addLike']);
Route::post('song',[SongController::class,'song']);
Route::post('search',[SearchController::class,'search']);
