<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

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

Route::get('/', [PetController::class, 'index'])->name('search');
Route::get('/create', [PetController::class, 'create'])->name('create');
Route::get('/edit', [PetController::class, 'edit'])->name('edit');
Route::put('/update', [PetController::class, 'update'])->name('update');
Route::post('/store', [PetController::class, 'store'])->name('store');
Route::get('/delete', [PetController::class, 'delete'])->name('delete');
Route::delete('/destroy', [PetController::class, 'destroy'])->name('destroy');
