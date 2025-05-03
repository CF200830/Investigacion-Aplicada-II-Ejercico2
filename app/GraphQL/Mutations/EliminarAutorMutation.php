<?php

namespace App\GraphQL\Mutations;

use App\Models\Autor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class EliminarAutorMutation extends Mutation
{
    protected $attributes = [ // Nombre de la mutación
        'name' => 'eliminarAutor',
        'description' => 'Elimina un autor de la base de datos'
    ];

    public function args(): array
    {
        return [// Definimos los argumentos que acepta la mutación
            // ID del autor a eliminar
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del autor a eliminar'
            ],
        ];
    }

    public function type(): Type
    {
        // Puedes devolver un tipo simple como Boolean
        return Type::boolean();
    }

    public function resolve($root, $args)
    {
        $autor = Autor::findOrFail($args['id']);

        return $autor->delete(); // Devuelve true si lo eliminó correctamente
    }
}
