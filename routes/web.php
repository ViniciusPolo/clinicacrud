<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\AgendamentosController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/medicos', [MedicosController::class, 'index']);
Route::get('/medicos/create', [MedicosController::class, 'create']);
Route::post('/medicos/store', [MedicosController::class, 'store']);
Route::get('/medicos/{id}', [MedicosController::class, 'show']);
Route::get('/medicos/edit/{id}', [MedicosController::class, 'edit']);
Route::post('/medicos/update/{id}', [MedicosController::class, 'update']);
Route::get('/medicos/delete/{id}', [MedicosController::class, 'destroy']);

Route::get('/pacientes', [PacientesController::class, 'index']);
Route::get('/pacientes/create', [PacientesController::class, 'create']);
Route::post('/pacientes/store', [PacientesController::class, 'store']);
Route::get('/pacientes/{id}', [PacientesController::class, 'show']);
Route::get('/pacientes/edit/{id}', [PacientesController::class, 'edit']);
Route::post('/pacientes/update/{id}', [PacientesController::class, 'update']);
Route::get('/pacientes/delete/{id}', [PacientesController::class, 'destroy']);

Route::get('/agendamentos', [AgendamentosController::class, 'index']);
Route::get('/agendamentos/create', [AgendamentosController::class, 'create']);
Route::post('/agendamentos/store', [AgendamentosController::class, 'store']);
Route::get('/agendamentos/{id}', [AgendamentosController::class, 'show']);
Route::get('/agendamentos/edit/{id}', [AgendamentosController::class, 'edit']);
Route::post('/agendamentos/update/{id}', [AgendamentosController::class, 'update']);
Route::get('/agendamentos/delete/{id}', [AgendamentosController::class, 'destroy']);


Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
