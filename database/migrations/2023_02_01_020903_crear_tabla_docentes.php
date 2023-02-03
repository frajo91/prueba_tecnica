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
       Schema::create('Docentes', function(Blueprint $table){
            $table->id();
            $table->string('nombres');
            $table->integer('nro_documento');
            $table->integer('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->string('ciudad');
            $table->foreignId('fk_id_tipo_documento')
                    ->constrained('Tipo_documento')
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
         Schema::drop('Docentes');
    }
};
