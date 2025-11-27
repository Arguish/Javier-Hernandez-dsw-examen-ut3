<?php
//Javier Hernandez Gonzalez


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;




class ProductController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'categoria-producto' => 'required|in:Electrónica,Deporte',
            'nombre-producto' => 'required|string|min:3|max:100',
            'precio' => 'required|integer|max:3000',
            'unidades' => 'required|integer|min:1',
        ]);



        $nombreProducto = $request->input('nombre-producto');
        $descripcionProducto = $request->input('descripcion-producto');
        $categoriaProducto = $request->input('categoria-producto');
        $precioProducto = $request->input('precio');
        $unidadesProducto = $request->input('unidades');

        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"' . $categoriaProducto . '";"' . $precioProducto . '";"' . $unidadesProducto . "\"\n";

        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);

        return redirect()->route('product.create')->with('unidades', $unidadesProducto);
    }
}
