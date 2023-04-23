<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha = now();
        $venta = Venta::with('cliente')
            ->whereDate('created_at', $fecha)->get();
        return response()->json($venta);
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

    public function fechventas(Request $request)
    {

        $fecha1 = $request->input('fecha1');
        $fecha2 = $request->input('fecha2');

        $venta = Venta::with('cliente')
            ->whereBetween('created_at', [$fecha1, $fecha2])
            ->orwhereDate('created_at', [$fecha1, $fecha2])
            ->orderby('created_at', 'asc')
            ->get();
        return response()->json($venta);
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
        $venta = Venta::create($request->all());
        return response()->json($venta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Venta::with('cliente')->where('cliente_id', $id)->orderby('created_at', 'desc')->get();

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
        //
    }
}
