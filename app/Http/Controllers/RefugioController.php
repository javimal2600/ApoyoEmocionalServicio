<?php

namespace App\Http\Controllers;
use App\Models\Refugio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RefugioController extends Controller
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
        return view('pages.Refugio.index')->with('refugios',$refugios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('refugio.create');
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
        $refugio = new Refugio();

        $refugio->nombre = $request->get('nombre');
        $refugio->telefono = $request->get('telefono');
        $refugio->correo = $request->get('correo');

        $refugio->save();

        return redirect('/refugios');

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
        $refugio = Refugio::find($id);
        return view('refugio.edit')->with('refugio',$refugio);
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
        $refugio = Refugio::findOrfail($id);

        $refugio->nombre = $request->get('nombre');
        $refugio->telefono = $request->get('telefono');
        $refugio->correo = $request->get('correo');

        $refugio->save();

        return redirect('/refugios');
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
        $refugio = Refugio::findOrfail($id);
        $refugio->delete();

        return redirect('/refugios');
    }
}
