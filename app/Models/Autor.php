<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    
    use HasFactory;
    // Definimos la tabla asociada al modelo
    protected $fillable = ['nombre'];
    //
    public function libros()
    {
        // Definimos la relación uno a muchos con el modelo Libro
        return $this->hasMany(Libro::class);
    }
}

