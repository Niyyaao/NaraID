<?php

use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

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

    // route halaman profile
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'save'])->name('profile.save');

    //route halaman admin
    Route::resource('/admin', App\Http\Controllers\Admin\AdminController::class);

    // route halaman album
    Route::resource('/album', App\Http\Controllers\Admin\AlbumController::class);

    // route untuk halaman pemesanan
    Route::resource('/order', App\Http\Controllers\Admin\OrderController::class)->except(['create', 'store']);

    // route untuk halaman buyer
    Route::resource('/buyer', App\Http\Controllers\Admin\BuyerController::class)->only(['index', 'show', 'destroy']);
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

    // route halaman profile
    Route::get('/profile', [App\Http\Controllers\Buyer\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\Buyer\ProfileController::class, 'save'])->name('profile.save');

    // route halaman album
    Route::resource('/album', App\Http\Controllers\Buyer\AlbumController::class)->only(['index', 'show']);

    // route halaman order
    Route::resource('/order', App\Http\Controllers\Buyer\OrderController::class);

    }
    
);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
