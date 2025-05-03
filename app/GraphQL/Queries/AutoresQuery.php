<?php

namespace App\GraphQL\Queries;

use App\Models\Autor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class AutoresQuery extends Query
{// Definimos la consulta
    protected $attributes = [
        'name' => 'autores',
    ];
// Nombre de la consulta
    public function type(): Type
    {
        return Type::listOf(\GraphQL::type('Autor'));
    }
// Tipo de retorno de la consulta, en este caso una lista de autores
// Definimos los argumentos que acepta la consulta
    public function resolve($root, $args)
    {
        return Autor::with('libros')->get();
    }
}