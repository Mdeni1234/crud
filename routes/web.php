<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PegawaiComponent;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('check_role:admin');

Route::get('/pegawai', PegawaiComponent::class)->middleware('auth');
