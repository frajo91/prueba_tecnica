<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Validator;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $carrera=Carrera::where('estado','=','1')->get();
         if ($carrera->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
        return response()->json(['estado'=>'success','data'=>$carrera],200);
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
            'SEMESTRES'=>'required|integer',
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }
            $carrera=new Carrera;
            $carrera->nombre_carrera=$request->NOMBRE;
            $carrera->n_semestres=$request->SEMESTRES;
            $carrera->save();

            return response()->json(['estado'=>'success','mensaje'=>'Carrera creado con exito'],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {

         if ($carrera->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
        return response()->json(['estado'=>'success','data'=>$carrera],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
       $validation = Validator::make($request->all(),[ 
            'NOMBRE' => 'required|min:5',
            'SEMESTRES'=>'required|integer',
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }

            $carrera->nombre_carrera=$request->NOMBRE;
            $carrera->n_semestres=$request->SEMESTRES;
            $carrera->save();

            return response()->json(['estado'=>'success','mensaje'=>'Carrera modificada con exito'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->estado=0;
        $carrera->save();
        return response()->json(['estado'=>'success','mensaje'=>'Registro eliminado con exito'],200);
    }
}
