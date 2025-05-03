<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    // Definimos la tabla asociada al modelo
    protected $fillable = ['titulo', 'autor_id'];
    // Definimos la tabla asociada al modelo
    public function autor()
    {// Definimos la relación inversa con el modelo Autor
        return $this->belongsTo(Autor::class);
    }
}}
