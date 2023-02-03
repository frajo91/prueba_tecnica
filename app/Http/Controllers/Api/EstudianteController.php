<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Models\Carrera;
use Validator;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante=Estudiante::where('estado','=','1')->get();
       if ($estudiante->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
        return response()->json(['estado'=>'success','data'=>$estudiante],200);
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
            'NOMBRES' => 'required|min:5',
            'DOCUMENTO' => 'required|integer',
            'TELEFONO'=> 'required|integer',
            'CORREO'=> 'required|email',
            'DIRECCION'=> 'required|string',
            'CIUDAD'=> 'required|string',
            'SEMESTRE'=>'required|integer',
            'CARRERA'=>'required|integer',  
            'TIPO_DOCUMENTO'=>'required|integer'
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }


       if (TipoDocumento::where('estado','=','1')->find($request->TIPO_DOCUMENTO)&&Carrera::where('estado','=','1')->find($request->CARRERA)) {

        if (Estudiante::where('nro_documento','=',$request->DOCUMENTO)->where('fk_id_tipo_documento','=',$request->TIPO_DOCUMENTO)->count()>0) {
            return response()->json(['estado'=>'fail','mensaje'=>'El estudiante ya se encuentra registrado'],200);
        }
            $estudiante=new Estudiante;
            $estudiante->nombres=$request->NOMBRES;
            $estudiante->nro_documento=$request->DOCUMENTO;
            $estudiante->telefono=$request->TELEFONO;
            $estudiante->correo=$request->CORREO;
            $estudiante->direccion=$request->DIRECCION;
            $estudiante->ciudad=$request->CIUDAD;
            $estudiante->semestre=$request->SEMESTRE;
            $estudiante->fk_id_tipo_documento=$request->TIPO_DOCUMENTO;
            $estudiante->fk_id_carrera=$request->CARRERA;
            $estudiante->save();

            return response()->json(['estado'=>'success','mensaje'=>'Estudiante creado con exito'],200);
        }else{
            return response()->json(['estado'=>'fail','mensaje'=>'Carrera o Tipo de Documento incorrectos'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        if ($estudiante->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
       return response()->json(['estado'=>'success','data'=>$estudiante],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
       $validation = Validator::make($request->all(),[ 
            'NOMBRES' => 'required|min:5',
            'DOCUMENTO' => 'required|integer',
            'TELEFONO'=> 'required|integer',
            'CORREO'=> 'required|email',
            'DIRECCION'=> 'required|string',
            'CIUDAD'=> 'required|string',
            'SEMESTRE'=>'required|integer',
            'CARRERA'=>'required|integer',
            'TIPO_DOCUMENTO'=>'required|integer'
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }

       if (TipoDocumento::find($request->TIPO_DOCUMENTO)&&Carrera::find($request->CARRERA)) {

            if (Estudiante::where('nro_documento','=',$request->DOCUMENTO)->where('fk_id_tipo_documento','=',$request->TIPO_DOCUMENTO)->where('id','!=',$estudiante->id)->count()>0) {
                return response()->json(['estado'=>'fail','mensaje'=>'El documento ya se encuentra registrado a otro estudiante'],200);
            }

            $estudiante->nombres=$request->NOMBRES;
            $estudiante->nro_documento=$request->DOCUMENTO;
            $estudiante->telefono=$request->TELEFONO;
            $estudiante->correo=$request->CORREO;
            $estudiante->direccion=$request->DIRECCION;
            $estudiante->ciudad=$request->CIUDAD;
            $estudiante->semestre=$request->SEMESTRE;
            $estudiante->fk_id_tipo_documento=$request->TIPO_DOCUMENTO;
            $estudiante->fk_id_carrera=$request->CARRERA;
            $estudiante->save();

            return response()->json(['estado'=>'success','mensaje'=>'Estudiante modificado con exito'],200);
        }else{
            return response()->json(['estado'=>'fail','mensaje'=>'Carrera o Tipo de Documento incorrectos'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->estado=0;
        $estudiante->save();
        return response()->json(['estado'=>'success','mensaje'=>'Registro eliminado con exito'],200);
    }
}
