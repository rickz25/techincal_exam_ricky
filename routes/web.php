<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;



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
Route::get('/', [ProviderController::class, 'index'])->name('index');
Route::post('store-provider', [ProviderController::class, 'store'])->name('store.provider');
Route::post('update-provider/{id}', [ProviderController::class, 'update'])->name('update.provider');
Route::delete('destroy-provider/{id}', [ProviderController::class, 'destroy'])->name('destroy.provider');
Route::post('ajax-call', [ProviderController::class, 'getImageURL']);

// Route::resource('provider', ProviderController::class);
