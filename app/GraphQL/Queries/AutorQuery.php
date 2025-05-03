<?php

namespace App\GraphQL\Queries;

use App\Models\Autor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type as GraphQLType;

class AutorQuery extends Query
{// Definimos la consulta
    protected $attributes = [
        'name' => 'autor', // Nombre de la consulta
    ];
   
    // Tipo de retorno de la consulta, en este caso un autor específico
    public function type(): Type
    {
        return \GraphQL::type('Autor');
    }

    public function args(): array
    {
        return [// Definimos los argumentos que acepta la consulta
            // ID del autor a buscar
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Autor::with('libros')->findOrFail($args['id']);
   // Buscamos el autor por ID y cargamos sus libros relacionados
    // Devuelve el autor encontrado o lanza una excepción si no se encuentra
    }
}