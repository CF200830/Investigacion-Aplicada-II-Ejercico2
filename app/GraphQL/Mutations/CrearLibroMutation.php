<?php

namespace App\GraphQL\Mutations;

use App\Models\Libro;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CrearLibroMutation extends Mutation
{
    protected $attributes = [
        'name' => 'crearLibro'
    ];

    public function type(): Type
    {
        return GraphQL::type('Libro'); // Devuelve el libro creado especificamente
    }

    public function args(): array
    {
        return [// Especificamos los argumentos que la mutación acepta
            'titulo' => [
                'name' => 'titulo',
                'type' => Type::nonNull(Type::string())
            ],
            'autor_id' => [
                'name' => 'autor_id',
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Libro::create([
            'titulo' => $args['titulo'],
            'autor_id' => $args['autor_id'],
        ]);
    }
}

// En este código, hemos definido una mutación llamada "crearLibro"
// que toma dos argumentos: "titulo" y "autor_id".
// Luego, crea un nuevo libro en la base de datos utilizando estos argumentos.