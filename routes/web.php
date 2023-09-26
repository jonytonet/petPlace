<?php

use App\Http\Controllers\ProfileController;
use App\Models\Pet;
use App\Models\ServiceReference;
use Illuminate\Support\Facades\Route;

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

    Route::prefix('admin')->group(function () {
        Route::view('clientes', 'admin.customers.index')->name('customers.index');
        Route::view('pets', 'admin.pets.index')->name('pets.index');
        Route::view('pet/{id}', 'admin.pets.show')->name('pets.show');
        Route::view('cadastros', 'admin.miscellaneous-records.index')->name('miscellaneous-records.index');
        Route::view('daycare', 'admin.daycare.index')->name('daycare.index');
        Route::view('daycare/plans', 'admin.daycare.plans')->name('daycare.plans');
        Route::view('daycare/enrollment', 'admin.daycare.enrollment')->name('daycare.enrollment');
        Route::view('daycare/historic', 'admin.daycare.historic')->name('daycare.historic');
    });

});

Route::get('teste-codigo', function () {

    //$pet = Pet::find(1);
    dd(ServiceReference::generateServiceReference());
});

require __DIR__.'/auth.php';
