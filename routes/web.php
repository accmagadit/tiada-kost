<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TipeKamarBackendController;
use \App\Http\Controllers\PenghuniBackendController;
use \App\Http\Controllers\TipePembayaranBackendController;
use \App\Http\Controllers\UangBulananBackendController;
use \App\Http\Controllers\KamarBackendController;
use \App\Http\Controllers\LaporanBackendController;
use \App\Http\Controllers\UserBackendController;
use \App\Http\Controllers\LandingPageController;

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

Route::get('/', [LandingPageController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::resource('tipekamar-backend',TipeKamarBackendController::class);
Route::resource('penghuni-backend',PenghuniBackendController::class);
Route::resource('tipepembayaran-backend', TipePembayaranBackendController::class);

Route::resource('uangbulanan-backend', UangBulananBackendController::class);
Route::resource('kamar-backend', KamarBackendController::class);
Route::resource('laporan-backend', LaporanBackendController::class);
Route::resource('user-backend', UserBackendController::class);
Route::get('/uangbulanan-backend/search-penghuni', [UangBulananBackendController::class, 'searchPenghuni'])->name('search.penghuni');


