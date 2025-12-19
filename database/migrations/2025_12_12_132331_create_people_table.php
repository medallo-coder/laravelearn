<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('edad')->nullable();
            $table->integer('edad_actual')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('lugar')->nullable();
            $table->string('lugar_aparicion')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->enum('sexo', ['hombre', 'mujer'])->nullable();
            $table->string('descripcion_fisica')->nullable();
            $table->string('vestimenta')->nullable();
            $table->string('foto')->nullable();

            $table->foreignId('rol_id')
                ->constrained('roles');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
