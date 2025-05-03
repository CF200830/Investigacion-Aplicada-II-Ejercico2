<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('autors', function (Blueprint $table) {
            $table->id(); // Columna 'id' (autoincremental)
            $table->string('nombre'); // Columna obligatoria para el nombre
            $table->timestamps(); // Campos de 'created_at' y 'updated_at'
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('autors');
    }
};