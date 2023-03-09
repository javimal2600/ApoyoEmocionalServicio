<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Encuesta;

class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solicituds = \DB::table('solicituds')
        ->join('encuestas','encuestas.id','=','solicituds.encuesta_id')
        ->join('psicologos','psicologos.id','=','encuestas.psicologo_id')
        ->join('clientes','clientes.id','=','encuestas.cliente_id')
        ->select('solicituds.id','clientes.nombre as cliente','solicituds.fecha')
        ->get();

        return view('solicituds.index')
            ->with('solicituds',$solicituds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $encuestas = Encuesta::all();
        return view('solicituds.create')
            ->with('encuestas',$encuestas);
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
        $solicitud = new Solicitud();

        $solicitud->encuesta_id = $request->get('encuesta_id');
        $solicitud->fecha = $request->get('fecha');

        $solicitud->save();

        return redirect('/solicituds');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $encuestas = Encuesta::all();
        $solicituds = Solicitud::find($id);
        return view('solicituds.edit')
            ->with('encuestas',$encuestas)
            ->with('solicituds',$solicituds);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $solicitud = Solicitud::find($id);
        $solicitud->delete();

        return redirect('/solicituds');
    }
}
