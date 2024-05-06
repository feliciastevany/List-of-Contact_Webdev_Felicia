<?php

// use App\Http\Controllers\CobaController;

use App\Http\Controllers\CobaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagesController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'Home']);
Route::get('/product/{id}-{name}', [HomeController::class, 'Product']);

Route::get('/test', [CobaController::class, 'Index']);

Route::get('/contact', [ContactController::class, 'View']);
Route::post('/contact', [ContactController::class, 'ActionContact']);
Route::get('/messages', [ContactController::class, 'store']);
Route::get('/contact/list', [ContactController::class, 'ContactList']);
Route::delete('/messages/{id}', [ContactController::class, 'destroy'])->name('delete.message');
// Route::get('/msg', [ContactController::class, 'ShowContactInfo'])->name('msg');



Route::view('/cart', 'cart');
Route::view('/product', 'product');
Route::view('/login', 'login');
// Route::view('/contact', 'contact');
