<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\HomeController;

// Página inicial com autenticação
Route::get('/', fn () => view('admin.dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// Rotas de autenticação (Laravel UI)
Auth::routes();

// Rota home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Grupo de rotas autenticadas e com prefixo/admin + nome admin.
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::controller(UsuarioController::class)->prefix('usuarios')->name('usuarios.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });
});
