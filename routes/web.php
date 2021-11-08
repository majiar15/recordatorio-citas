<?php

use App\Http\Controllers\patient;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[patient::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/crear-paciente', function () {
    return view('newPatient');
})->middleware(['auth'])->name('newPatient');
Route::post('/new-patient',[patient::class, 'store'])->middleware(['auth'])->name('createPatient');
Route::get('/editarPaciente', [patient::class, 'edit'])->middleware(['auth'])->name('editPatient');
Route::post('/edit-patient',[patient::class, 'update'])->middleware(['auth'])->name('updatePatient');

Route::get('/delete/{id}', [patient::class, 'destroy'])->middleware(['auth'])->name('deletePatient');

require __DIR__.'/auth.php';
