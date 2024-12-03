<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    
    protected $fillable = [
        'nombre', 
        'email', 
        'telefono', 
        'direccion', 
        'razon_social', 
        'rfc'
    ];

    // Relación con cotizaciones
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
}