<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';
    
    protected $fillable = [
        'cliente_id', 
        'categoria_id', 
        'servicio_id', 
        'costo', 
        'cantidad', 
        'total'
    ];

    // Relaciones
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}