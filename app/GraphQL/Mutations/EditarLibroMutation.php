<?php

namespace App\GraphQL\Mutations;

use App\Models\Libro;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL;

class EditarLibroMutation extends Mutation
{
    // Nombre de la mutación
    protected $attributes = [
        'name' => 'editarLibro',
        'description' => 'Edita un libro existente'
    ];

    // Definimos los tipos de entrada (argumentos que recibe la mutación)
    public function args(): array
    {
        return [// Especificamos los argumentos que la mutación acepta
            // ID del libro a editar
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del libro a editar'
            ],
            'titulo' => [
                'type' => Type::string(),
                'description' => 'Nuevo título del libro'
            ],
            'autor_id' => [
                'type' => Type::int(),
                'description' => 'Nuevo autor del libro'
            ],
        ];
    }

    // Define el tipo de dato que devuelve (Libro)
    public function type(): Type
    {
        return GraphQL::type('Libro');
    }

    // Lógica de la mutación
    public function resolve($root, $args)
    {
        $libro = Libro::findOrFail($args['id']);

        if (isset($args['titulo'])) {
            $libro->titulo = $args['titulo'];
        }

        if (isset($args['autor_id'])) {
            $libro->autor_id = $args['autor_id'];
        }

        $libro->save();

        return $libro;
    }
}
