<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cotizacion;
use App\Models\Servicio;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CotizacionController extends Controller
{
    // Mostrar lista de cotizaciones
    public function index()
    {
        $cotizaciones = Cotizacion::with(['cliente', 'categoria', 'servicio'])->get();
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $clientes = Cliente::all();
        $categorias = Categoria::all();
        $servicios = Servicio::all();
        return view('cotizaciones.create', compact('clientes', 'categorias', 'servicios'));
    }

    // Guardar nueva cotización
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'categoria_id' => 'required|exists:categorias,id',
            'servicio_id' => 'required|exists:servicios,id',
            'cantidad' => 'required|numeric|min:1'
        ]);

        // Obtener el costo del servicio
        $servicio = Servicio::findOrFail($datosValidados['servicio_id']);
        $total = $servicio->costo_unitario * $datosValidados['cantidad'];

        $cotizacion = Cotizacion::create([
            'cliente_id' => $datosValidados['cliente_id'],
            'categoria_id' => $datosValidados['categoria_id'],
            'servicio_id' => $datosValidados['servicio_id'],
            'costo' => $servicio->costo_unitario,
            'cantidad' => $datosValidados['cantidad'],
            'total' => $total
        ]);

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización creada exitosamente');
    }

    // Generar PDF de cotización
    public function generarPDF(Cotizacion $cotizacion)
    {
        $pdf = PDF::loadView('cotizaciones.pdf', compact('cotizacion'));
        return $pdf->download('cotizacion.pdf');
    }
}