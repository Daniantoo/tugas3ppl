<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AddressController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('sesi/welcome');
});

Route::resource('Contact', ContactController::class);
Route::resource('Address', AddressController::class);

Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);


Route::get('/address/register', [AddressController::class, 'register']);
Route::post('/address/create', [AddressController::class, 'create']);

