<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});
//REGISTER AUTH
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
//LOGIN AUTH
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//HOME ROUTE
Route::get('/home', [HomeController::class, 'index'])->name('home');

//TICKETS
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/{id}/add-solution', [TicketController::class, 'addSolution'])->name('tickets.addSolution');
Route::post('/tickets/{id}/store-solution', [TicketController::class, 'storeSolution'])->name('tickets.storeSolution');
// FINALIZAR TICKET
Route::patch('/tickets/{id}/finalize', [TicketController::class, 'finalize'])->name('tickets.finalize');
// REPORTS
Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
Route::get('/reports/create', [ReportsController::class, 'create'])->name('reports.create');

// EXPORTAMOS REPORTES
Route::get('/export-pdf', [PDFController::class, 'generatePDF'])->name('export.pdf');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create')->middleware('role:2');
//     Route::resource('tickets', TicketController::class)->except(['create']);
// });

// 

Route::middleware(['auth', 'check.userid'])->group(function () {
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
});

