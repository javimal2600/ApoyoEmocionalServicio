<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologo;

class PsicologoController extends Controller
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
        $psicologos = Psicologo::all();
        return view('pages.Psicologo.index')->with('psicologos',$psicologos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.psicologos');

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
        $psicologos = new Psicologo();

        $psicologos->nombre = $request->get('nombre');
        $psicologos->apellido = $request->get('apellido');
        $psicologos->telefono = $request->get('telefono');
        $psicologos->fechanac = $request->get('fechanac');
        $psicologos->correo = $request->get('correo');
        $psicologos->cedula = $request->get('cedula');

        $psicologos->save();

        return redirect('/psicologos');
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
        $psicologo = Psicologo::find($id);
        return view('psicologo.edit')->with('psicologo',$psicologo);

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
        $psicologo = Psicologo::findOrfail($id);

        $psicologo->nombre = $request->get('nombre');
        $psicologo->apellido = $request->get('apellido');
        $psicologo->telefono = $request->get('telefono');
        $psicologo->fechanac = $request->get('fechanac');
        $psicologo->correo = $request->get('correo');
        $psicologo->cedula = $request->get('cedula');

        $psicologo->save();

        return redirect('/psicologos');
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
        $psicologo = Psicologo::findOrfail($id);
        $psicologo->delete();

        return redirect('/psicologos');
    }
}
