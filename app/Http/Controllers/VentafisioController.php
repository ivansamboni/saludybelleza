<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventasfisio;

class VentafisioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha = now();
        $ventasfisio = Ventasfisio::with('cliente')
            ->whereDate('created_at', $fecha)->get();
        return response()->json($ventasfisio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function fechventasfisio(Request $request)
    {

        $fecha1 = $request->input('fecha1');
        $fecha2 = $request->input('fecha2');

        $ventasfisio = Ventasfisio::with('cliente')
            ->whereBetween('created_at', [$fecha1, $fecha2])
            ->orwhereDate('created_at', [$fecha1, $fecha2])
            ->orderby('created_at', 'asc')
            ->get();
        return response()->json($ventasfisio);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'precio' => 'required',
        ]);
        $ventasfisio = Ventasfisio::create($request->all());
        return response()->json($ventasfisio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Ventasfisio::with('cliente')->where('cliente_id', $id)->orderby('created_at', 'desc')->get();

        return response()->json($registro);
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
        $registro = Ventasfisio::find($id);
        $registro->delete();
    }
}
