<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
    Route::get('/productos', function (){return view('admin.productos.index');})->name('admin.productos.index');
    Route::get('/formproductos', function(){return view('admin.productos.form');})->name('admin.productos.form');
    Route::post('/saveproducto', [ProductosController::class, 'saveProducto'])->name('save.producto');
    Route::get('/editproducto/{id}', [ProductosController::class, 'editProducto'])->name('edit.producto');
    Route::post('/updateproducto', [ProductosController::class, 'updateProducto'])->name('update.producto');
});

