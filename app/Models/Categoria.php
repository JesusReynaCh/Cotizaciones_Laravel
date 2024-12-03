<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    
    protected $fillable = [
        'nombre', 
        'descripcion'
    ];

    // Relación con servicios
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
    
}