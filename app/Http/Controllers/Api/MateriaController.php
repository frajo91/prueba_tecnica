<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $materia=Materia::where('estado','=','1')->get();
         if ($materia->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
        return response()->json(['estado'=>'success','data'=>$materia],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validation = Validator::make($request->all(),[ 
            'NOMBRE' => 'required|min:5',
            'DESCRIPCION' => 'required|min:5',
            'CREDITOS'=>'required|integer',
            'OBLIGATORIA'=>'required|integer',
            'AREA'=>'required|integer',            
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }
            $materia=new Materia;
            $materia->nombres=$request->NOMBRE;
            $materia->descripcion=$request->DESCRIPCION;
            $materia->creditos=$request->CREDITOS;
            $materia->obligatoria=$request->OBLIGATORIA;
            $materia->fk_id_area=$request->AREA;
            $materia->save();

            return response()->json(['estado'=>'success','mensaje'=>'Materia creado con exito'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        return response()->json(['estado'=>'success','data'=>$materia],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
       $validation = Validator::make($request->all(),[ 
            'NOMBRE' => 'required|min:5',
            'DESCRIPCION' => 'required|min:5',
            'CREDITOS'=>'required|integer',
            'OBLIGATORIA'=>'required|integer',
            'AREA'=>'required|integer',            
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }
            $materia->nombres=$request->NOMBRE;
            $materia->descripcion=$request->DESCRIPCION;
            $materia->creditos=$request->CREDITOS;
            $materia->obligatoria=$request->OBLIGATORIA;
            $materia->fk_id_area=$request->AREA;
            $materia->save();

            return response()->json(['estado'=>'success','mensaje'=>'Materia creado con exito'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        $materia->estado=0;
        $materia->save();
        return response()->json(['estado'=>'success','mensaje'=>'Registro eliminado con exito'],200);
    }
}
