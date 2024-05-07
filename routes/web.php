<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CurriculumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('lead', LeadController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);

    Route::get('/admission', [AdmissionController::class, 'index'])->name('admission');
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice-index');
    Route::get('/invoice-show/{id}', [InvoiceController::class, 'showInvoice'])->name('invoice-show');

    Route::resource('course', CourseController::class);
    Route::resource('curriculum', CurriculumController::class);
});

require __DIR__.'/auth.php';
