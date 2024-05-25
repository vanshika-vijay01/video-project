<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'index'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/dashboard',[AuthController::class, 'dashboard'])->name('dashboard'); 

    Route::get('category',[CategoryController::class,'index'])->name('category.index');
    Route::get('add-category',[CategoryController::class,'create'])->name('category.create');

    Route::post('store-category',[CategoryController::class,'store'])->name('category.store');

    Route::get('edit-category/{id?}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('update-category/{id?}',[CategoryController::class,'update'])->name('category.update');
    Route::get('deelete-category/{id?}',[CategoryController::class,'destroy'])->name('category.delete');

    Route::get('video',[VideoController::class,'index'])->name('video.index');
    Route::get('add-video',[VideoController::class,'create'])->name('video.create');

    Route::post('store-video',[VideoController::class,'store'])->name('video.store');

    Route::get('edit-video/{id?}',[VideoController::class,'edit'])->name('video.edit');
    Route::post('update-video/{id?}',[VideoController::class,'update'])->name('video.update');
    Route::get('deelete-video/{id?}',[VideoController::class,'destroy'])->name('video.delete');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

