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
    Schema::create('characteristics', function (Blueprint $table) {
       $table->id('id_caracteristica');

       $table->string('sexo')->nullable();
       $table->integer('edad')->nullable();

       $table->string('estatura')->nullable();
       $table->string('complexion')->nullable();

       $table->string('color_piel')->nullable();
       $table->string('color_ojos')->nullable();
       $table->string('color_cabello')->nullable();
       $table->string('tipo_cabello')->nullable();

       $table->text('senas_particulares')->nullable();
       $table->string('implantes')->nullable(); // tornillos, placas
       $table->string('protesis')->nullable();  // dental, pierna artificial
       $table->foreignId('persona_id')
          ->constrained('people')
          ->cascadeOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristics');
    }
};
