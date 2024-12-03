<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    // Listar servicios
    public function index()
    {
        $servicios = Servicio::with('categoria')->get();
        return view('servicios.index', compact('servicios'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $categorias = Categoria::all();
        return view('servicios.create', compact('categorias'));
    }

    // Guardar nuevo servicio
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'required|string|max:255',
            'costo_unitario' => 'required|numeric|min:0'
        ]);

        $servicio = Servicio::create($datosValidados);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio creado exitosamente');
    }

    // Editar servicio
    public function edit(Servicio $servicio)
    {
        $categorias = Categoria::all();
        return view('servicios.edit', compact('servicio', 'categorias'));
    }

    // Actualizar servicio
    public function update(Request $request, Servicio $servicio)
    {
        $datosValidados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'required|string|max:255',
            'costo_unitario' => 'required|numeric|min:0'
        ]);

        $servicio->update($datosValidados);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio actualizado exitosamente');
    }

    // Eliminar servicio
    public function destroy(Servicio $servicio)
    {
        // Verificar si el servicio tiene cotizaciones asociadas
        if ($servicio->cotizaciones()->count() > 0) {
            return redirect()->route('servicios.index')
                ->with('error', 'No se puede eliminar un servicio con cotizaciones asociadas');
        }

        $servicio->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado exitosamente');
    }

    // Mostrar detalles del servicio
    public function show(Servicio $servicio)
    {
        $cotizaciones = $servicio->cotizaciones;
        return view('servicios.show', compact('servicio', 'cotizaciones'));
    }

    // Obtener servicios por categoría (para uso en formularios dinámicos)
    public function serviciosPorCategoria($categoriaId)
    {
        $servicios = Servicio::where('categoria_id', $categoriaId)->get();
        return response()->json($servicios);
    }
}