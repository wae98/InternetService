<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StatusRouterController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PersonalReferenceController;
use App\Http\Controllers\MufaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeCableController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\FailController;
use App\Http\Controllers\PaymentServiceController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ExcelController;
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

Route::resource('routers', RouterController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('customers', CustomerController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('services', ServiceController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('fails', FailController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('paymentservices', PaymentServiceController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('servicesproviders', ServiceProviderController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('typecables', TypeCableController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('mufas', MufaController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('sectors', SectorController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('references', PersonalReferenceController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('statusRouters', StatusRouterController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('usuarios', UsersController::class)->middleware(['auth:sanctum', 'verified']);

Route::resource('roles', RolesController::class)->middleware(['auth', 'verified']);

Route::controller(PdfController::class)->group(function () {
    Route::get('/payments/ticket/{id}', 'payments')->name('payments.ticket.pdf');
});


Route::controller(ExcelController::class)->group(function () {
    Route::get('/report/payments/', 'PaymentsIndex')->name('payments.excel.index');
    Route::get('/report/customers/', 'CustomersIndex')->name('customers.excel.index');
    Route::get('/report/services/', 'ServicesIndex')->name('services.excel.index');
    Route::get('/report/fails/', 'FailsIndex')->name('fails.excel.index');
    Route::post('/fails/excel', 'fails')->name('fails.excel');
    Route::post('/payments/excel', 'payments')->name('payments.excel');
    Route::post('/customers/excel', 'customers')->name('customers.excel');
    Route::post('/services/excel', 'services')->name('services.excel');
});

Route::middleware(['auth:sanctum', 'verified'])->get('register', function () {
    return view('inicio');
})->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('forgot-password', function () {
    return view('inicio');
})->name('forgot-password');
