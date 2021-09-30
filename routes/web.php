<?php

use App\Http\Controllers\PasteController;
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


Auth::routes();
Route::redirect('/', '/pastes');
Route::get('pastes', [PasteController::class, 'index'])->name('index.paste');
Route::post('pastes', [PasteController::class, 'store'])->name('store.paste');
Route::get('/{hash}', [PasteController::class, 'show'])->name('show.paste');
//dibasaj@mailinator.com
//Pa$$w0rd!
