<?php
// Este archivo define el controlador de productos
namespace App\Http\Controllers;
// Importamos la clase Request para manejar las peticiones HTTP
use Illuminate\Http\Request;
// Importamos File por si se necesita trabajar con archivos
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // Método para almacenar el producto enviado desde el formulario
    public function store(Request $request)
    {
        // Recogemos los datos enviados por el formulario
        $nombreProducto = $request->input('nombre-producto');
        $descripcionProducto = $request->input('descripcion-producto');
        $categoriaProducto = $request->input('categoria-producto');
        $precioProducto = $request->input('precio-producto');

        // Validación manual
        $errores = [];
        if (empty($nombreProducto) || !is_string($nombreProducto) || strlen($nombreProducto) > 50) {
            $errores[] = 'El nombre debe tener como máximo 50 caracteres.';
        }
        if (empty($descripcionProducto) || !is_string($descripcionProducto)) {
            $errores[] = 'La descripción es obligatoria.';
        }
        if ($categoriaProducto !== 'Informática' && $categoriaProducto !== 'Bricolaje') {
            $errores[] = 'La categoría debe ser Informática o Bricolaje.';
        }
        if (!is_numeric($precioProducto) || intval($precioProducto) < 1 || intval($precioProducto) != $precioProducto) {
            $errores[] = 'El precio debe ser un número entero positivo.';
        }

        // Si hay errores, volvemos al formulario con los errores
        if (count($errores) > 0) {
            return redirect()->route('product.create')->withErrors($errores)->withInput();
        }

        // Formateamos la línea para guardar en el archivo CSV
        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"' . $categoriaProducto . '";"' . $precioProducto . "\n";

        // Guardamos la línea en el archivo productos.csv
        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);

        // Mostramos la vista de confirmación
        return view('product_success');
    }
}
