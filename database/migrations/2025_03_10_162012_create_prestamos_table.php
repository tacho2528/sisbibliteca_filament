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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();

            //lave foranea que relaciona con estudiantes
            $table->foreignId('estudiante_id')->constrained()->onDelete('cascade');

            //lave foranea que relaciona con libros
            $table->foreignId('libro_id')->constrained()->onDelete('cascade');

            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->string('estado')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
