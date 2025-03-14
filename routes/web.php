<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


// Главная страница, отображающая список книг
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Маршрут для отображения всех книг
Route::get('books', [BookController::class, 'index'])->name('books.index');

// Маршрут для создания новой книги
Route::get('books/create', [BookController::class, 'create'])->name('books.create');

// Маршрут для сохранения новой книгиы
Route::post('books', [BookController::class, 'store'])->name('books.store');

// Маршрут для отображения конкретной книги
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');

// Маршрут для редактирования книги
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

// Маршрут для обновления книги
Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');

// Маршрут для удаления книги
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);
// Подключение маршрутов аутентификации
require __DIR__.'/auth.php';
