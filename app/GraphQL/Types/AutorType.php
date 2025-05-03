<?php

namespace App\GraphQL\Types;
/*
 * AutorType.php
 * Este archivo define el tipo GraphQL para los autores.
 * Se utiliza para definir la estructura de los datos que se devuelven al cliente.
 */
use App\Models\Autor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AutorType extends GraphQLType
{
    protected $attributes = [// Nombre del tipo
        'name' => 'Autor',
        'description' => 'Colección de autores',
        'model' => Autor::class
    ];

    public function fields(): array
    {
        return [// Definimos los campos del tipo
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del autor',
            ],
            'nombre' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Nombre del autor',
            ],
            'libros' => [
                'type' => Type::listOf(\GraphQL::type('Libro')),
                'description' => 'Libros del autor',
                'resolve' => function($root) {
                    return $root->libros;// Relación con los libros
                }
            ]
        ];
    }
}