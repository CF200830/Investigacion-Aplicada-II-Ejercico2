<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Autor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Validation\Rule;

class EditarAutorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'editarAutor',
        'description' => 'Edita un autor existente'
    ];

    public function type(): Type
    {
        /*Especifica que esta mutación retornará un objeto de tipo Autor*/
        return GraphQL::type('Autor');
    }

    public function args(): array
    {
        return [
            'id' => [/* ID del autor a editar */
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID del autor a editar',
              
            ],
            /* 'nombre' => [/* Nuevo nombre del autor */
            'nombre' => [
                'type' => Type::string(),
                'description' => 'Nuevo nombre del autor',
                'rules' => function(array $args = []) {
                    return [
                        'sometimes',
                        'string',
                        'max:255',
                        Rule::unique('autors', 'nombre')->ignore($args['id'])
                    ];
                }/* Regla de validación para el nombre del autor
                /* 'sometimes' significa que este campo es opcional y solo se valida si se proporciona.*/
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $autor = Autor::findOrFail($args['id']);

        if (isset($args['nombre'])) {
            $autor->nombre = $args['nombre'];
        }

        $autor->save();

        return $autor;
    }
}