<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pensul;
use Illuminate\Http\Request;

class PensulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pensul=Pensul::where('estado','=','1')->get();
         if ($pensul->count()<=0) {
            return response()->json(['estado'=>'success','mensaje'=>'No se encontraron registros'],200);
        }
        return response()->json(['estado'=>'success','data'=>$pensul],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pensul  $pensul
     * @return \Illuminate\Http\Response
     */
    public function show(Pensul $pensul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pensul  $pensul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pensul $pensul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pensul  $pensul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pensul $pensul)
    {
        //
    }
}
