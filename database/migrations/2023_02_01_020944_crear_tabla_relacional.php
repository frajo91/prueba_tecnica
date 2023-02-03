<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('Relacional', function(Blueprint $table){
            $table->id();
            $table->foreignId('fk_id_estudiante')
                    ->constrained('Estudiantes')
                    ->restrictOnUpdate()
                    ->restrictOnDelete();
            $table->foreignId('fk_id_docente')
                    ->constrained('Docentes')
                    ->restrictOnUpdate()
                    ->restrictOnDelete();
            $table->foreignId('fk_id_pensul')
                    ->constrained('Pensul')
                    ->restrictOnUpdate()
                    ->restrictOnDelete();
            $table->boolean('estado')->default(true);
            $table->timestamps();
             });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Relacional');
    }
};
