<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Listar categorías
    public function index()
    {
        $categorias = Categoria::withCount('servicios')->get();
        return view('categorias.index', compact('categorias'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('categorias.create');
    }

    // Guardar nueva categoría
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string|max:500'
        ]);

        $categoria = Categoria::create($datosValidados);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente');
    }

    // Editar categoría
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Actualizar categoría
    public function update(Request $request, Categoria $categoria)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,'.$categoria->id,
            'descripcion' => 'nullable|string|max:500'
        ]);

        $categoria->update($datosValidados);

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría actualizada exitosamente');
    }

    // Eliminar categoría
    public function destroy(Categoria $categoria)
    {
        // Verificar si la categoría tiene servicios asociados
        if ($categoria->servicios()->count() > 0) {
            return redirect()->route('categorias.index')
                ->with('error', 'No se puede eliminar una categoría con servicios asociados');
        }

        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría eliminada exitosamente');
    }

    // Mostrar detalles de la categoría
    public function show(Categoria $categoria)
    {
        $servicios = $categoria->servicios;
        return view('categorias.show', compact('categoria', 'servicios'));
    }
}