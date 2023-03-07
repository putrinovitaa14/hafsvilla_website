<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillaController;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {

// });

Route::get('/', [App\Http\Controllers\frontend\VillaController::class, 'villa']);
Route::get('/villa/{id}', [App\Http\Controllers\frontend\VillaController::class, 'detail']);
Route::get('/morevilla', [App\Http\Controllers\frontend\VillaController::class, 'moreVilla']);

Route::middleware('auth')->group(function () {
    Route::post('/booking', [App\Http\Controllers\frontend\PemesananController::class, 'booking']);
    Route::get('/detailBooking/{id}', [App\Http\Controllers\frontend\PemesananController::class, 'detailBooking']);
    Route::get('/profile', [App\Http\Controllers\frontend\ProfileController::class, 'profile']);
    Route::post('/ratingVilla', [App\Http\Controllers\frontend\ProfileController::class, 'rating']);

});

Route::get('/template', function () {
    return view('layouts.admin');
});

Route::get('/about', function () {
    return view('layouts.user.about');
});

// Route::get('/user', function () {
//     return view('layouts.user.user');
// });

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.component.dashboard');
    });
    Route::resource('/user', UserController::class);
    Route::resource('/lokasi', LokasiController::class);
    Route::resource('/kota', KotaController::class);
    Route::resource('/kecamatan', KecamatanController::class);
    Route::resource('/villa', VillaController::class);
    Route::resource('/image', ImageController::class);
    Route::resource('/pemesanan', PemesananController::class);
    Route::resource('/rating', RatingController::class);
});

Route::get('/getKecamatan/{id}', function ($id) {
    $kecamatans = Kecamatan::where('kota_id', $id)->get();
    return response()->json($kecamatans);
});

Route::resource('/navbar', NavbarController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
