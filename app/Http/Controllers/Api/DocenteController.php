<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Validator;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente=Docente::where('estado','=','1')->get();
       if ($docente->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
        return response()->json(['estado'=>'success','data'=>$docente],200);
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
            'TIPO_DOCUMENTO'=>'required|integer'
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }

       if (TipoDocumento::find($request->TIPO_DOCUMENTO)) {
            if (Docente::where('nro_documento','=',$request->DOCUMENTO)->where('fk_id_tipo_documento','=',$request->TIPO_DOCUMENTO)->count()>0) {
                return response()->json(['estado'=>'fail','mensaje'=>'El docente ya se encuentra registrado'],200);
            }
            $docente=new Docente;
            $docente->nombres=$request->NOMBRES;
            $docente->nro_documento=$request->DOCUMENTO;
            $docente->telefono=$request->TELEFONO;
            $docente->correo=$request->CORREO;
            $docente->direccion=$request->DIRECCION;
            $docente->ciudad=$request->CIUDAD;
            $docente->fk_id_tipo_documento=$request->TIPO_DOCUMENTO;
            $docente->save();

            return response()->json(['estado'=>'success','mensaje'=>'Docente creado con exito'],200);
        }else{
            return response()->json(['estado'=>'fail','mensaje'=>'Tipo de Documento incorrectos'],200);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        if ($docente->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
       return response()->json(['estado'=>'success','data'=>$docente],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        $validation = Validator::make($request->all(),[ 
            'NOMBRES' => 'required|min:5',
            'DOCUMENTO' => 'required|integer',
            'TELEFONO'=> 'required|integer',
            'CORREO'=> 'required|email',
            'DIRECCION'=> 'required|string',
            'CIUDAD'=> 'required|string',
            'TIPO_DOCUMENTO'=>'required|integer'
        ]);

        if ($validation->fails()) {
            return response()->json(['estado'=>'fail','data'=>$validation->messages()],200);
        }

        if (TipoDocumento::find($request->TIPO_DOCUMENTO)) {

            if (Docente::where('nro_documento','=',$request->DOCUMENTO)->where('fk_id_tipo_documento','=',$request->TIPO_DOCUMENTO)->where('id','!=',$docente->id)->count()>0) {
                return response()->json(['estado'=>'fail','mensaje'=>'El documento ya se encuentra registrado a otro docente'],200);
            }
            $docente->nombres=$request->NOMBRES;
            $docente->nro_documento=$request->DOCUMENTO;
            $docente->telefono=$request->TELEFONO;
            $docente->correo=$request->CORREO;
            $docente->direccion=$request->DIRECCION;
            $docente->ciudad=$request->CIUDAD;
            $docente->fk_id_tipo_documento=$request->TIPO_DOCUMENTO;
            $docente->save();

            return response()->json(['estado'=>'success','mensaje'=>'Docente actualizado con exito'],200);
        }else{
            return response()->json(['estado'=>'fail','mensaje'=>'Tipo de Documento incorrectos'],200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->estado=0;
        $docente->save();
        return response()->json(['estado'=>'success','mensaje'=>'Registro eliminado con exito'],200);
    }
}
