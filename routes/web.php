<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SucursalController;  // <--- Importa el controlador
use App\Http\Controllers\TipoReservacionController;

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
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');

// Reservaciones
Route::prefix('reservaciones')->name('reservaciones.')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('index');
    Route::get('/create', [ReservationController::class, 'create'])->name('create');   // <-- aquí
    Route::post('/', [ReservationController::class, 'store'])->name('store');
    Route::get('/{id}', [ReservationController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [ReservationController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ReservationController::class, 'update'])->name('update');
});

Route::prefix('clientes')->name('clientes.')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('index');
    Route::get('/{id}', [ClienteController::class, 'show'])->name('show');
});

Route::prefix('sucursales')->name('sucursales.')->group(function () {
    Route::get('/', [SucursalController::class, 'index'])->name('index');
    Route::get('/create', [SucursalController::class, 'create'])->name('create');
    Route::post('/', [SucursalController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [SucursalController::class, 'edit'])->name('edit');
    Route::put('/{id}', [SucursalController::class, 'update'])->name('update');
});

Route::prefix('salones')->name('salones.')->group(function () {
    Route::get('/', [SalonController::class, 'index'])->name('index');
    Route::get('/create', [SalonController::class, 'create'])->name('create');
    Route::post('/', [SalonController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [SalonController::class, 'edit'])->name('edit');
    Route::put('/{id}', [SalonController::class, 'update'])->name('update');
});

Route::prefix('tipos-reservacion')->name('tipos-reservacion.')->group(function () {
    Route::get('/', [TipoReservacionController::class, 'index'])->name('index');
    Route::get('/create', [TipoReservacionController::class, 'create'])->name('create');
    Route::post('/', [TipoReservacionController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TipoReservacionController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TipoReservacionController::class, 'update'])->name('update');
});


Route::resource('sucursal', SucursalController::class)->middleware('auth');
