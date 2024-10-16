<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RelacionLaboralController;
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

Route::get('/',HomeController::class);
Route::resource('carrera', CarreraController::class)->except('show');
Route::resource('area', AreaController::class)->except('show');
Route::resource('laboral', RelacionLaboralController::class)->except('show');
Route::resource('personal', PersonalController::class);

Route::get('/asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index');
Route::get('/asistencia/asistencia', [AsistenciaController::class, 'create'])->name('asistencia.create');
Route::post('/asistencia', [AsistenciaController::class, 'store'])->name('asistencia.store');

Route::get('/asistencia/ci', [AsistenciaController::class, 'show'])->name('asistencia.show');

Route::get('/asistencia/{asistencia}/edit', [AsistenciaController::class, 'edit'])->name('asistencia.edit');
Route::put('/asistencia/{asistencia}', [AsistenciaController::class, 'update'])->name('asistencia.update');
Route::delete('/asistencia/{asistencia}', [AsistenciaController::class, 'destroy'])->name('asistencia.destroy');
//Route::resource('asistencia', AsistenciaController::class);
