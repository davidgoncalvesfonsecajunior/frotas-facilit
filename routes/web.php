<?php

use App\Http\Controllers\Admin\VehicleController;
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

Route::redirect('/', '/admin/vehicles');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('vehicles', [VehicleController::class, 'vehicles'])->name('vehicles.listar');
    Route::get('vehicles/salvar', [VehicleController::class, 'formAddVehicles'])->name('vehicles.form');
    Route::post('vehicles/salvar', [VehicleController::class, 'adicionar'])->name('vehicles.adicionar');
    Route::delete('vehicles/{id}', [VehicleController::class, 'deletar'])->name('vehicles.deletar');
    Route::get('vehicles/{id}', [VehicleController::class, 'formEditar'])->name('vehicles.formEditar');
    Route::put('vehicles/{id}', [VehicleController::class, 'editar'])->name('vehicles.editar');
});
