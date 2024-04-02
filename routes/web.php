<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\albumController;
use App\Http\Controllers\photoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('creatAlbum',[albumController::class,'create'])->name('createAlbum');
Route::post('movePhoto',[albumController::class,'move'])->name('movePhoto');
Route::get('deleteAlbum',[albumController::class,'delete'])->name('deleteAlbum');
Route::get('deleteAllPhotos',[albumController::class,'delete'])->name('deleteAllPhotos');
Route::get('/', [albumController::class,'index']);


Route::get('{id}/photos',[photoController::class,'index'])->name('photos');
Route::get('deletePhoto',[photoController::class,'delete'])->name('deletePhoto');
Route::post('{id}/upload',[photoController::class,'upload'])->name('upload');

