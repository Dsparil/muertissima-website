<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController, 
    ShowsController, 
    MusicController,
    PhotosController,
    ShopController,
    InterviewController,
    ContactController
};

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shows', [ShowsController::class, 'index'])->name('shows');
Route::get('/photos', [PhotosController::class, 'index'])->name('photos');
Route::get('/music', [MusicController::class, 'index'])->name('music');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/message', [ContactController::class, 'index'])->name('contact.postMessage');