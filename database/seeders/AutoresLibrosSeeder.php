<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Database\Seeder;

class AutoresLibrosSeeder extends Seeder
{
    public function run()
    {
        $autor1 = Autor::create(['nombre' => 'Gabriel García Márquez']);
        $autor2 = Autor::create(['nombre' => 'J.K. Rowling']);

        Libro::create(['titulo' => 'Cien años de soledad', 'autor_id' => $autor1->id]);
        Libro::create(['titulo' => 'Harry Potter y la piedra filosofal', 'autor_id' => $autor2->id]);
    }
}
