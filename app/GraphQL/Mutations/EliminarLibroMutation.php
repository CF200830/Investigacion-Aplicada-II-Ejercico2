<?php

namespace App\GraphQL\Mutations;

use App\Models\Libro;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class EliminarLibroMutation extends Mutation
{
    protected $attributes = [// Nombre de la mutación
        'name' => 'eliminarLibro',
        'description' => 'Elimina un libro'
    ];

    public function args(): array
    {
        return [// Definimos los argumentos que acepta la mutación
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del libro a eliminar'
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
        $libro = Libro::findOrFail($args['id']);

        return $libro->delete(); // Devuelve true si lo eliminó correctamente
    }
}
