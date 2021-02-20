<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    public function crearCategoria(CreateCategoryRequest $request)
    {
        $this->authorize('admin');
        // Crear categoria
        $categoria = new Categoria();
        $categoria->nombre = $request->nombreCategoria;
        $categoria->save();

        // Carga el partial de la select de categorias
        $categorias = Categoria::all();
        $view = view('layouts.components.NoticiasPanel.selectCategoria', compact('categorias'))->render();

        // Devolvemos un json con status 201 si se ha creado correctamente
        return response()->json([
            'categoriaNombre' => $categoria->nombre, // Nombre de la categoría
            'categorias' => $view, // Todas las categorías
        ], Response::HTTP_CREATED);        
    }
    
    public function updateCategoria(UpdateCategoryRequest $request, Categoria $categoria)
    {
        $this->authorize('admin');
        
        $categoria = Categoria::where('id', $request->id)->first();
        $nombreCategoriaAntiguo = $categoria->nombre;
        $categoria->nombre = $request->nombreCategoriaInput;
        $categoria->save();

        $categorias = Categoria::all();
        $view = view('layouts.components.NoticiasPanel.selectCategoria', compact('categorias'))->render();

        return response()->json([
            'successMessage' => 'Se ha modificado categoria ' . $nombreCategoriaAntiguo . ' -> ' . $categoria->nombre,
            'categorias' => $view,
        ], Response::HTTP_CREATED);
    }

    public function deleteCategoria(Request $request, Categoria $categoria)
    {
        $this->authorize('admin');
        
        $noticias = Noticia::where('categoria', $categoria->id)->update(['categoria' => null]);
        $nombreCategoria = $categoria->nombre;
        $categoria->delete();

        $categorias = Categoria::all();
        $view = view('layouts.components.NoticiasPanel.selectCategoria', compact('categorias'))->render();

         return response()->json([
         'successMessage' => 'La categoria ' . $nombreCategoria . ' se ha eliminado.',
         'categorias' => $view,
        ], Response::HTTP_CREATED);
    }
}