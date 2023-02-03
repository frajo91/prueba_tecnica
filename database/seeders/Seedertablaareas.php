<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Area;

class Seedertablaareas extends Seeder
{
    static $areas=[
        'Agronomía, Veterinaria y afines'
        ,'Bellas Artes'
        ,'Ciencias de la Educación'
        ,'Ciencias de la Salud'
        ,'Ciencias Sociales y Humanas'
        ,'Economía, Administración, Contaduría y afines'
        ,'Ingeniería, Arquitectura, Urbanismo y afines'
        ,'Matemáticas y Ciencias Naturales'
    ];

    /**
     * Run the database seeds.
     * 
     *
     * @return void
     */
    public function run()
    {
       foreach (self::$areas as $area) {
            $TArea=new Area;
            $TArea->nombre_area = $area;
            $TArea->save();
        }
    }
}
