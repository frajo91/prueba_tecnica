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
       Schema::create('Pensul', function(Blueprint $table){
            $table->id();
            $table->foreignId('fk_id_carrera')
                    ->constrained('Carreras')
                    ->restrictOnUpdate()
                    ->restrictOnDelete();
            $table->foreignId('fk_id_materia')
                    ->constrained('Materias')
                    ->restrictOnUpdate()
                    ->restrictOnDelete();
            $table->integer('semestre');
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
        Schema::drop('Pensul');
    }
};
