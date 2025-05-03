<?php

declare(strict_types=1);
namespace App\GraphQL\Mutations;

use App\Models\Autor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CrearAutorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'crearAutor'
    ];

    public function type(): Type
    {
        return GraphQL::type('Autor'); // Devuelve el autor creado
    }

    public function args(): array
    {
        return [
            'nombre' => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function resolve($root, $args)
    {
        return Autor::create([
            'nombre' => $args['nombre'],
        ]);
    }
}
// En este código, hemos definido una mutación llamada "crearAutor" 
// que toma un argumento "nombre" y crea un nuevo autor en la base de datos.