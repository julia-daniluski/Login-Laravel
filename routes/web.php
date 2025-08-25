<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

// Cadastro de usuário
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::post('/store-user', [UserController::class, 'store'])->name('users.store');

// Login
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'authenticate'])->name('user.authenticate');

// Página de redefinição de senha (pública)
Route::get('/password/edit', function () {
    return view('edit'); // edit.blade.php
})->name('password.edit');
Route::post('/password/update', [UserController::class, 'updatePassword'])->name('password.update');

// Rotas protegidas (apenas para usuários logados)
Route::middleware('auth')->group(function () {

    // Área logada
    Route::get('/logado', [UserController::class, 'logado'])->name('user.logado');

    // Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Edição de usuário
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('users.update');
});
