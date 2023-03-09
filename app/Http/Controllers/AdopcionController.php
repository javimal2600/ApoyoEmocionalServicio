<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopcion;
use App\Models\Mascota;
use App\Models\Solicitud;
Use PDF;

class AdopcionController extends Controller
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
        $adopcions = \DB::table('adopcions')
        ->join('solicituds','solicituds.id','=','adopcions.solicitud_id')
        ->join('encuestas','encuestas.id','=','solicituds.encuesta_id')
        ->join('mascotas','mascotas.id','=','adopcions.mascota_id')
        ->join('clientes','clientes.id','=','encuestas.cliente_id')
        ->select('adopcions.id','clientes.nombre as cliente','adopcions.fecha','mascotas.nombre as mascota')
        ->get();

        return view('adopcions.index')
            ->with('adopcions',$adopcions);
    }


    public function generar_pdf(){
        $adopcions = \DB::table('adopcions')
        ->join('solicituds','solicituds.id','=','adopcions.solicitud_id')
        ->join('encuestas','encuestas.id','=','solicituds.encuesta_id')
        ->join('mascotas','mascotas.id','=','adopcions.mascota_id')
        ->join('clientes','clientes.id','=','encuestas.cliente_id')
        ->select('adopcions.id','clientes.nombre as cliente','adopcions.fecha','mascotas.nombre as mascota')
        ->get();
        $pdf = PDF::loadview('adopcions.generar_pdf ',compact('adopcions'));
        return $pdf->download('reporte_adopciones.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $solicituds = Solicitud::all();
        $mascotas = Mascota::all();
        return view('adopcions.create')
            ->with('mascotas',$mascotas)
            ->with('solicituds',$solicituds);
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
        $adopcions = new Adopcion();

        $adopcions->mascota_id = $request->get('mascota_id');
        $adopcions->solicitud_id = $request->get('solicitud_id');
        $adopcions->fecha = $request->get('fecha');

        $adopcions->save();

        return redirect('/adopcions');
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
        $solicituds = Solicitud::all();
        $mascotas = Mascota::all();
        $adopcions = Adopcion::find($id);
        return view('adopcions.edit')
            ->with('adopcions',$adopcions)
            ->with('mascotas',$mascotas)
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
        $adopcions = Adopcion::find($id);
        $adopcions->delete();

        return redirect('/adopcions');
    }
}
