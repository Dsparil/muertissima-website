<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ShopController,
    ContactController,
    Admin\RiderController as RiderController
};
use App\Models\Quote;
use Illuminate\Http\Request;

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

Route::get('/',           [HomeController::class,    'index'])->name('home');
Route::get('/shows',      [HomeController::class,    'shows'])->name('shows');
Route::get('/photos',     [HomeController::class,    'photos'])->name('photos');
Route::get('/music',      [HomeController::class,    'music'])->name('music');
Route::get('/interviews', [HomeController::class,    'interviews'])->name('interviews');
Route::get('/about',      [HomeController::class,    'about'])->name('about');
Route::get('/shop',       [ShopController::class,    'index'])->name('shop');
Route::get('/contact',    [ContactController::class, 'index'])->name('contact');

Route::get('/random-quote', function(Request $request) {
    if (!$request->ajax()) {
        abort(404);
    }
    echo Quote::random();
})->name('random-quote');

Route::post('/pickle', function() {
    return view('easteregg');
})->name('easteregg');

Route::post('/doggystyle', function() {
    return view('easteregg2');
})->name('easteregg2');

Route::get('/js/js-vars.js', function() {
    $content = view('js-vars');
    return response($content)->header('Content-Type', 'application/javascript');
})->name('js-vars');

Route::post('/contact/message', [ContactController::class, 'index'])->name('contact.postMessage');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('/rider')->name('rider.')->group(function () {
        Route::get('/', [RiderController::class, 'edit'])->name('edit');
        Route::post('/save', [RiderController::class, 'save'])->name('save');
        Route::get('/generate', [RiderController::class, 'generatePDF'])->name('generate');
        Route::get('/wkgenerate', [RiderController::class, 'generateWKPDF'])->name('wkgenerate');
    });
});

Route::get('/.well-known/pki-validation/3D5143A88C50F120AB04B8B94D57BACD.txt', function() {
     return response(file_get_contents('../3D5143A88C50F120AB04B8B94D57BACD.txt'), 200)
        ->header('Content-Type', 'text/plain');
});