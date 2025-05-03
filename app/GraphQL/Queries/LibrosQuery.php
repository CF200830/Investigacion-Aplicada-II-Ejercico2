<?php

namespace App\GraphQL\Queries;

use App\Models\Libro;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class LibrosQuery extends Query
{// Definimos la consulta
    protected $attributes = [
        'name' => 'libros',
    ];
// Nombre de la consulta
    public function type(): Type
    {// Tipo de retorno de la consulta, en este caso una lista de libros
        // Definimos los argumentos que acepta la consulta
        return Type::listOf(\GraphQL::type('Libro'));
    }

    public function resolve($root, $args)
    {   // Buscamos todos los libros
        // y cargamos sus autores relacionados
        // Devuelve la lista de libros encontrados
        // o lanza una excepción si no se encuentra
        return Libro::with('autor')->get();
    }
}