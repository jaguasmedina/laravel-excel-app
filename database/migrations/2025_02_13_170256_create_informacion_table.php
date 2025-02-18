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
        Schema::create('informacion', function (Blueprint $table) {
            $table->id(); // Equivalente a `id` INT NOT NULL AUTO_INCREMENT
            $table->string('tipo_documento', 90); // VARCHAR(90) NOT NULL
            $table->string('num_documento', 90); // VARCHAR(90) NOT NULL
            $table->string('nombre_completo', 350)->nullable(); // VARCHAR(350) NULL
            $table->string('empresa', 350)->nullable(); // VARCHAR(350) NULL
            $table->string('fecha_registro', 45)->nullable(); // VARCHAR(45) NULL
            $table->string('fecha_vigente', 45)->nullable(); // VARCHAR(45) NULL
            $table->string('cargo', 150)->nullable(); // VARCHAR(150) NULL
            $table->string('concepto', 90)->nullable(); // VARCHAR(90) NULL
            $table->timestamps(); // Opcional: agrega `created_at` y `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion');
    }
};