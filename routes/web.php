<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Registrasi pembeli
Route::get('/register', [App\Http\Controllers\Auth\Buyer\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\Buyer\RegisterController::class, 'register']);

//dashboard admin
Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'auth:web',
    ],
    function(){
    //route untuk dashboard admin
    Route::get('/', [App\Http\Controllers\AdminDashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');
    }
    
);

//dashboard pembeli
Route::group(
    [
        'prefix' => 'buyer',
        'as' => 'buyer.',
        'middleware' => 'auth:buyer',
    ],
    function(){
    //route untuk dashboard pembeli
    Route::get('/', [App\Http\Controllers\BuyerDashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\BuyerDashboardController::class, 'index'])->name('dashboard');
    }
    
);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
