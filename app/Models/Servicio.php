<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'categoria_id',
        'descripcion',
        'costo_unitario'
    ];

    // Relación con categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
}
