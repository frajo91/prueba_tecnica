<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class Seedertablatipodocumento extends Seeder
{
    static $tipos=[
        'CEDULA DE CIUDADANIA'
        ,'CEDULA DE EXTRANJERIA'
        ,'NUMERO DE IDENTIFICACION PERSONAL'
        ,'NUMERO DE IDENTIFICACION TRIBUTARIA'
        ,'TARJETA DE IDENTIDAD'
        ,'PASAPORTE'

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$tipos as $tipo) {
            $Ttipo=new TipoDocumento;
            $Ttipo->nombre_documento = $tipo;
            $Ttipo->save();
        }
    }
}
