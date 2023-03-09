<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;
use App\Models\Cliente;
use App\Models\Psicologo;

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
        $encuestas = \DB::table('encuestas')
        ->join('psicologos','psicologos.id','=','encuestas.psicologo_id')
        ->join('clientes','clientes.id','=','encuestas.cliente_id')
        ->select('encuestas.id as id_encuesta',
        'clientes.nombre as client','clientes.id','psicologos.nombre as psico','psicologos.id')
        ->get();

        return view('encuestas.index')
            ->with('encuestas',$encuestas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = Cliente::all();
        $psicologos = Psicologo::all();
        return view('Encuestas.create')
            ->with('clientes',$clientes)
            ->with('psicologos',$psicologos);
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

        $encuesta->cliente_id = $request->get('cliente_id');
        $encuesta->psicologo_id = $request->get('psicologo_id');
        $encuesta->pr1 = $request->get('pr1');
        $encuesta->pr2 = $request->get('pr2');
        $encuesta->pr3 = $request->get('pr3');
        $encuesta->pr4 = $request->get('pr4');
        $encuesta->pr5 = $request->get('pr5');
        $encuesta->pr6 = $request->get('pr6');

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
        $psicologos = Psicologo::all();
        $clientes = Cliente::all();
        $encuesta = Encuesta::find($id);
        return view('encuestas.edit')
        ->with('encuesta',$encuesta)
        ->with('psicologos',$psicologos)
        ->with('clientes',$clientes);
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
        $encuesta = Encuesta::find($id);
        $encuesta->cliente_id = $request->get('cliente_id');
        $encuesta->psicologo_id = $request->get('psicologo_id');
        $encuesta->pr1 = $request->get('pr1');
        $encuesta->pr2 = $request->get('pr2');
        $encuesta->pr3 = $request->get('pr3');
        $encuesta->pr4 = $request->get('pr4');
        $encuesta->pr5 = $request->get('pr5');
        $encuesta->pr6 = $request->get('pr6');

        $encuesta->save();

        return redirect('/encuestas');
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
