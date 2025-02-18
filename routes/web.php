<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ReporteController;

// Página de bienvenida redirige al dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rutas de autenticación (login, registro, etc.)
Auth::routes();

// Rutas protegidas por autenticación
//Route::middleware('auth')->group(function () {
    // Ruta del dashboard
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Rutas para la gestión de información
    Route::resource('informacion', App\Http\Controllers\InformacionController::class);

    // Ruta para la carga de datos desde Excel
    Route::get('/carga-excel', [App\Http\Controllers\CargaExcelController::class, 'showForm'])->name('carga.excel.form');
    Route::post('/carga-excel', [App\Http\Controllers\CargaExcelController::class, 'upload'])->name('carga.excel.upload');

    // Ruta para la visualización de logs (solo para administradores)
    Route::get('/logs', [App\Http\Controllers\LogController::class, 'index'])->name('logs.index')->middleware('admin');

    // Ruta para la gestión de usuarios (solo para administradores)
    Route::resource('users', App\Http\Controllers\UserController::class)->middleware('admin');

    // Ruta para la edición de perfil
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //Ruta para cargar Excel
    Route::get('/import', [ImportController::class, 'showForm'])->name('import.form');
    Route::post('/import', [ImportController::class, 'import'])->name('import');

    //RUta Reporte
    Route::get('/reportes', [ReporteController::class, 'showForm'])->name('report.form');
    Route::post('/reportes/generar', [ReporteController::class, 'generateReport'])->name('report.generate');
    Route::post('/reportes/exportar', [ReporteController::class, 'exportExcel'])->name('report.export');

//});

// Ruta alternativa para el home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
