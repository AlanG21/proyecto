<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumnaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('principal');
});

//Rutas para el examen, alumnas y grupos

/*Las habia puesto hasta abajo para que me pidiera autenticar y
 añadir lo de dropzone pero ya no me dio el tiempo asi que no sera necesario autenticarte
*/

Route::get('/alumnas', [AlumnaController::class, 'index'])->name("alumnas");
Route::post('/alumnas', [AlumnaController::class, 'store']);
Route::get('/grupos', [GrupoController::class, 'index'])->name("grupos");
Route::post('/grupos', [GrupoController::class, 'store']);








Route::get('/register', [RegisterController::class, 'index' ])->name('register');
Route::post('/register', [RegisterController::class, 'store' ]);

Route::get('/login', [ LoginController::class, 'index'])->name('login');
Route::post('/login', [ LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/muro', [PostController::class, 'index'])->name('posts.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ServiceController::class, 'index'])->name('dashboard');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::post('/services', [ServiceController::class, 'store'])->name('storeService');

   

    
});