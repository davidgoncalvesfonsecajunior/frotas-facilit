<?php

use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\PassageiroController;
use App\Http\Controllers\Admin\ReservaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\ReservabusController;
use App\Http\Controllers\ReservabusController as ControllersReservabusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::redirect('/', 'home');
// Route::get('/', function () {
//     $helloWorld = 'Hello World';
//     return view('welcome', ['helloWorld' => $helloWorld]);
// })->name('home');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reservas/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('reserva.single');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('vehicles', VehicleController::class)->except(['show']);


        Route::resource('departamentos', DepartamentoController::class)->except(['show']);

        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('reservas', ReservaController::class);
        Route::resource('reservabuses', ReservabusController::class);

        Route::prefix('passageiros')->name('passageiros.')->group(function () {

            Route::get('/{idReserva}', [PassageiroController::class, 'index'])->name('index');

            Route::get('/create/{idReserva}', [PassageiroController::class, 'create'])->name('create');

            Route::post('/store/{idReserva}', [PassageiroController::class, 'store'])->name('store');
            Route::get('/{passageiro}/edit', [PassageiroController::class, 'edit'])->name('edit');
            Route::PUT('/update/{passageiro}', [PassageiroController::class, 'update'])->name('update');
            Route::delete('/destroy/{passageiro}', [PassageiroController::class, 'destroy'])->name('destroy');
        });

        // Route::get('/index/{id}', [App\Http\Controllers\ReservaControler::class, 'index'])->name('reservas.index');
    });
});

Auth::routes();
