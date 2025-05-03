<?php

namespace App\GraphQL\Types;

use App\Models\Libro;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class LibroType extends GraphQLType
{// Definimos el tipo GraphQL para los libros
    protected $attributes = [// Nombre del tipo
        'name' => 'Libro',
        'description' => 'Colección de libros',
        'model' => Libro::class
    ];
        // Definimos los campos del tipo
    // Cada campo representa un atributo del modelo Libro
    // y puede incluir relaciones con otros modelos
    // En este caso, el modelo Libro tiene una relación con el modelo Autor
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del libro',
            ],
            'titulo' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Título del libro',
            ],
            'autor' => [// Relación con el modelo Autor
                'type' => \GraphQL::type('Autor'),
                'description' => 'Autor del libro',
                'resolve' => function($root) {
                    return $root->autor;// Relación con el autor
                }
            ]
        ];
    }
}