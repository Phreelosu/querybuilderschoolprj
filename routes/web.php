<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

Route::get('/cars', [CarController::class, 'getCars'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'addCar'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{car}', [CarController::class, 'getOneCar'])->name('cars.show');
Route::get('/cars/{car}/edit', [CarController::class, 'modifyCar'])->name('cars.edit');
Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}', [CarController::class, 'destroyCar'])->name('cars.destroy');

Route::get('/', function () {
    return view('welcome');
});
