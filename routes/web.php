<?php

// Este archivo define las rutas web de la aplicación

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Importamos la clase Route para definir rutas

Route::get('/', function () {
    return view('welcome');
});

// Ruta principal que muestra la vista de bienvenida


// Ruta para procesar el formulario de producto
Route::post('/product', [ProductController::class, 'store'])->name('product.store');


// Ruta para mostrar el formulario de producto
Route::get('/product/create', function () {
    return view('product_form');
})->name('product.create');
