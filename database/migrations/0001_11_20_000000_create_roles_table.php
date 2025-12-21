<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Roles iniciales
        DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'Desaparecido'],
            ['id' => 2, 'nombre' => 'Aparecido'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
