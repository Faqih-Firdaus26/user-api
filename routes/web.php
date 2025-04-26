<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserViewController;

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
    return redirect('/users');
});

Route::get('/users', [UserViewController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserViewController::class, 'create'])->name('users.create');
Route::post('/users', [UserViewController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserViewController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserViewController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserViewController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserViewController::class, 'destroy'])->name('users.destroy');
// Route::get('docs', function () {
//     return view('swagger.index');  // pastikan ini sesuai dengan view yang ada
// });