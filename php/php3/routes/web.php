<?php

use App\Http\Controllers\DemoController;
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
Route::match(['GET', 'POST'], '/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(
    function () {
        Route::get('/demo', [App\Http\Controllers\DemoController::class, 'index'])->name('route_student_index');
        Route::match(['GET', 'POST'], '/add', [App\Http\Controllers\DemoController::class, 'add'])->name('route_demo_add');
        Route::match(['GET', 'POST'], '/edit/{id}', [App\Http\Controllers\DemoController::class, 'edit'])->name('route_demo_edit');
        Route::get('/delete/{id}', [App\Http\Controllers\DemoController::class, 'delete'])->name('route_demo_delete');
    }
);
