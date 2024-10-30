<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta para la página principal
Route::get('/', function () { return view('welcome'); })->name('home');

// Ruta para mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta para mostrar el formulario de registro
Route::get('/register', function () { return view('register'); })->name('register');


Route::get('/index', function () {
    return view('index');
})->name('index');
