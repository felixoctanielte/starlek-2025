<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Actions\Logout;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
})->name('index');

// Admin Dashboard
Route::get('/adminpanel', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('adminpanel');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/division', function () {
    return view('division');
})->name('division');

Route::get('/stages', function () {
    return view('stages');
})->name('stages');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/mini-gerda', function () {
    return view('mini-gerda');
})->name('mini-gerda');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');


Route::get('/stages/nivara', function () {
    return view('nivara');
})->name ('nivara');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('/logout', Logout::class)->name('logout'); // Use POST for logout
Route::get('/logout', Logout::class)->name('logout');
require __DIR__.'/auth.php';
