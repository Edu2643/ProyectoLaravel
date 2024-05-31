<?php

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
    return view('index');
})->name('index');



use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;


Route::middleware(['auth'])->group(function(){ 
    
        Route::resource('clientes', ClienteController::class);
        Route::resource('facturas', FacturaController::class);
        Route::resource('productos', ProductoController::class);
        
        Route::middleware(['admin'])->group(function(){     
        
            Route::resource('usuarios', UsuariosController::class);
            Route::resource('perfiles', PerfilesController::class);    
        }); 
    
    
    
});
   

    

Route::get('carrito', [CarritoController::class, 'show'])->name('carrito');
Route::get('carrito/agregar/{id}', [CarritoController::class, 'add'])->name('carrito-agregar');
Route::get('carrito/borrar/{id}', [CarritoController::class, 'delete'])->name('carrito-borrar');
Route::get('carrito/vaciar', [CarritoController::class, 'trash'])->name('carrito-vaciar');
Route::get('carrito/actualizar/{id}/{cantidad?}', [CarritoController::class,'update'])->name('carrito-actualizar');
Route::get('ordenar', [CarritoController::class,'guardarPedido'])->name('ordenar');




    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




