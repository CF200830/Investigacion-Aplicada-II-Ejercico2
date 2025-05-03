<?php

declare(strict_types=1);

return [
    'default_schema' => 'default',

    'schemas' => [
        'default' => [
            'query' => [
                'autores' => App\GraphQL\Queries\AutoresQuery::class,
                'autor' => App\GraphQL\Queries\AutorQuery::class,
                'libros' => App\GraphQL\Queries\LibrosQuery::class,
            ],/* agregar el name de las mutaciones para poder utilizarlas*/ 
            'mutation' => [
                'crearAutor' => App\GraphQL\Mutations\CrearAutorMutation::class,
                'crearLibro' => App\GraphQL\Mutations\CrearLibroMutation::class,
                'editarLibro' => App\GraphQL\Mutations\EditarLibroMutation::class,
                'eliminarLibro' => App\GraphQL\Mutations\EliminarLibroMutation::class,
                'eliminarAutor' => App\GraphQL\Mutations\EliminarAutorMutation::class,
                'editarAutor' => App\GraphQL\Mutations\EditarAutorMutation::class,
                ],
            'middleware' => [],
            'method' => ['GET', 'POST'],
        ],
    ],

    'types' => [
        'Autor' => App\GraphQL\Types\AutorType::class,
        'Libro' => App\GraphQL\Types\LibroType::class,
    ],

    // Opciones adicionales
    'route' => [
        'prefix' => 'graphql',
        'controller' => \Rebing\GraphQL\GraphQLController::class . '@query',
        'middleware' => [],
    ],
    'batching' => ['enable' => true],
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
    ],
];