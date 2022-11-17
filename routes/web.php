<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AgenciasController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SlibretasController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VClienteController;
use App\Http\Controllers\VentasController;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('dashboard', DashboardController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('usuarios', UsersController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('roles', RolesController::class)->middleware(['auth', 'verified']);


Route::middleware(['auth:sanctum', 'verified'])->get('register', function () {
    return view('inicio');
})->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('forgot-password', function () {
    return view('inicio');
})->name('forgot-password');
