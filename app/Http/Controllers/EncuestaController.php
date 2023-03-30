<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;
use App\Models\Mascota;

class EncuestaController extends Controller
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
        $encuesta = \DB::table('encuestas')
        ->join('mascotas','mascotas_id','=','encuesta.encuesta_id')
        ->select('nombre',
        'mascota_id','mascotas.nombre as nombreM',
        'colonia',
        'delegacion',
        'ciudad',
        'codigoPostal',
        'tipocasa',
        'edad',
        'edades',
        'profesion',
        'animales',
        'mascotasAntes',
        'gasto',
        'tiempo',
        'dormir',
        'paseo',
        'dejarMascotaP',
        'cambioCasa',
        'compromiso',
        'economia',
        'porqueAdopcion',
        'otraMascota',
        'celular',
        'email')
        ->get();

        return view('encuesta.index')
            ->with('encuesta',$encuesta);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mascotas = Mascota::all();
        return view('Encuestas.create')
            ->with('mascotas',$mascotas);
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
        $encuesta = new Encuesta();

        $encuesta->nombre = $request->get('nombre');
        $encuesta->mascota_id = $request->get('mascota_id');
        $encuesta->colonia = $request->get('colonia');
        $encuesta->delegacion = $request->get('delegacion');
        $encuesta->ciudad = $request->get('ciudad');
        $encuesta->codigoPostal = $request->get('codigoPostal');
        $encuesta->tipocasa = $request->get('tipocasa');
        $encuesta->edad = $request->get('edad');
        $encuesta->edades = $request->get('edades');
        $encuesta->profesion = $request->get('profesion');
        $encuesta->animales = $request->get('animales');
        $encuesta->mascotasAntes = $request->get('mascotasAntes');
        $encuesta->gesto = $request->get('gesto');
        $encuesta->tiempo = $request->get('tiempo');
        $encuesta->paseo = $request->get('paseo');
        $encuesta->dejarMascota = $request->get('dejarMascota');
        $encuesta->cambioCasa = $request->get('cambioCasa');
        $encuesta->compromiso = $request->get('compromiso');
        $encuesta->economia = $request->get('economia');
        $encuesta->porqueAdopcion = $request->get('porqueAdopcion');
        $encuesta->otraMascota = $request->get('otraMascota');
        $encuesta->celular = $request->get('celular');
        $encuesta->email = $request->get('email');

        $encuesta->save();

        return redirect('/encuestas');
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
        $encuesta = Encuesta::find($id);
        $encuesta->delete();

        return redirect('/encuestas');
    }
}
