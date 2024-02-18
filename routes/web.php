<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;

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

Route::get('/', function () {
    return view('blog');
});

Route::get('/fritkot', [AlbumController::class, 'showAlbums']);
Route::get('/fritkot/{album}', [PhotoController::class, 'showPhotos']);

Route::post('/fritkot/login', [UserController::class, 'login']);
Route::post('/fritkot/logout', [UserController::class, 'logout']);

Route::post('/fritkot/create', [AlbumController::class, 'createAlbum']);
Route::put('/hide/{album}', [AlbumController::class, 'hideAlbum']);
Route::delete('/delete-album/{album}', [AlbumController::class, 'deleteAlbum']);
Route::post('/albumorder', [AlbumController::class, 'saveAlbumOrder']);
Route::put('/fritkot/{album}/update-album', [AlbumController::class, 'editAlbum']);

Route::post('/fritkot/{album}/add-photos', [PhotoController::class, 'addPhotos']);
Route::delete('/delete-photo/{photo}', [PhotoController::class, 'deletePhoto']);
Route::put('/edit/{photo}', [PhotoController::class, 'editPhoto']);
Route::post('/photoorder/{album}', [PhotoController::class, 'savePhotoOrder']);