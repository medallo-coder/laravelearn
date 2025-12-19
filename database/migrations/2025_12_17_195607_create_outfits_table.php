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
        Schema::create('outfits', function (Blueprint $table) {
            $table->id('id_outfit');
            $table->string('parte_superior');
            $table->string('color_superior');
            $table->string('parte_infeiror');
            $table->string('color_infeiror');
            $table->string('calzado');
            $table->string('color_calzado');
            $table->string('accesorios');
            $table->foreignId('persona_id')
             ->constrained('people')
             ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outfits');

    }
};
