<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DlhController;
use App\Http\Controllers\KlhController;
use App\Http\Controllers\DjpController;
use App\Http\Controllers\UserController;
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


Route::middleware(['web'])->group(function (){
    Route::get('/portal', function () {
        return view('login');
    });
    Route::post('/LoginAuth', [AuthController::class, 'loginUser']);
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:admin'])->group(function (){
    Route::get('/dashboardAdmin', [AdminController::class, 'index'])->name('dashboardAdmin');
    Route::get('/logoutAdmin', [AuthController::class, 'logoutAdmin']);
});

Route::middleware(['auth:user'])->group(function (){
    Route::get('/dashboardSwasta', [UserController::class, 'index'])->name('dashboardSwasta');
});

Route::middleware(['auth:dlh'])->group(function (){
    Route::get('/dashboardDlh', [DlhController::class, 'index'])->name('dashboardDLH');
});

Route::middleware(['auth:klh'])->group(function (){
    Route::get('/dashboardKlh', [KlhController::class, 'index'])->name('dashboardKLH');
});

Route::middleware(['auth:djp'])->group(function (){
    Route::get('/dashboardDjp', [DlhController::class, 'index'])->name('dashboardDJP');
});
