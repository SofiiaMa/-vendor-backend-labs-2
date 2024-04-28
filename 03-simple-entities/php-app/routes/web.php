<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

// Маршрут для главной страницы
Route::get('/', [SubscriberController::class, 'index'])->name('homepage');

// Маршруты для управления подписчиками
Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
Route::get('/subscribers/create', [SubscriberController::class, 'create'])->name('subscribers.create');
Route::post('/subscribers', [SubscriberController::class, 'store'])->name('subscribers.store');
Route::get('/subscribers/{id}', [SubscriberController::class, 'show'])->name('subscribers.show');
Route::get('/subscribers/{id}/edit', [SubscriberController::class, 'edit'])->name('subscribers.edit');
Route::put('/subscribers/{id}', [SubscriberController::class, 'update'])->name('subscribers.update');
Route::delete('/subscribers/{id}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');
