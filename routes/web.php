<?php

use App\Http\Controllers\ProfileController;
use App\Services\customer\CustomerService;
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
        Route::view('cadastros', 'admin.miscellaneous-records.index')->name('miscellaneous-records.index');
    });

});

Route::get('teste-codigo', function () {
    $teste = app()->make(CustomerService::class)->getZipCode('83.407-420');

    dd($teste);

});

require __DIR__.'/auth.php';
