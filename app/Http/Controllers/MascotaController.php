<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\TipoMascota;
use App\Models\Refugio;


class MascotaController extends Controller
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
        $refugios = Refugio::all();
        $tipos = TipoMascota::all();
        $mascotas = \DB::table('mascotas')
        ->join('refugios','refugios.id','=','mascotas.refugio_id')
        ->join('tipo_mascotas','tipo_mascotas.id','=','mascotas.tipo_mascota_id')
        ->select('mascotas.id as id_mascota','mascotas.nombre','mascotas.descripcion','mascotas.tamanio',
        'refugios.nombre as refugio','refugios.id','tipo_mascotas.nombre as tipos','tipo_mascotas.id')
        ->get();

        return view('pages.Mascota.index')
            ->with('mascotas',$mascotas)
            ->with('tipos',$tipos)
            ->with('refugios',$refugios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $refugios = Refugio::all();
        $tipos = TipoMascota::all();
        return view('mascotas.create')
            ->with('refugios',$refugios)
            ->with('tipos',$tipos);

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
        $mascota = new Mascota();

        $mascota->nombre = $request->get('nombre');
        $mascota->descripcion = $request->get('descripcion');
        $mascota->tamanio = $request->get('tamanio');
        $mascota->refugio_id = $request->get('refugio_id');
        $mascota->tipo_mascota_id = $request->get('tipo_mascota_id');

        $mascota->save();

        return redirect('/mascotas');
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
        $refugios = Refugio::all();
        $tipos = TipoMascota::all();
        $mascota = Mascota::find($id);
        return view('mascotas.edit')
        ->with('mascota',$mascota)
        ->with('refugios',$refugios)
        ->with('tipos',$tipos);
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
        $mascota = Mascota::findOrfail($id);

        $mascota->nombre = $request->get('nombre');
        $mascota->descripcion = $request->get('descripcion');
        $mascota->tamanio = $request->get('tamanio');
        $mascota->refugio_id = $request->get('refugio_id');
        $mascota->tipo_mascota_id = $request->get('tipo_mascota_id');

        $mascota->save();

        return redirect('/mascotas');
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
        $mascota = Mascota::findOrfail($id);
        $mascota->delete();

        return redirect('/mascotas');
    }
}
