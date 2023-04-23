<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

use Barryvdh\DomPDF\Facade\Pdf;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $fecha1 = now()->toDateString();
        $fecha2 = now()->addDays(3)->toDateString();
        $clientes = Cliente::whereBetween('estadoactivo', [$fecha1, $fecha2])->get();

        return response()->json($clientes);
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => 'required'

        ]);
       Cliente::create($request->all());
        return response()->json('Cliente Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bcedula)
    {

        $cliente = Cliente::where('identificacion', $bcedula)->firstOrFail();

        return response()->json($cliente);
        $pdf = Pdf::loadView('pdf', compact('cliente'));
        return $pdf->stream();


    }

    public function search($apellido)
    {

        $clientes = Cliente::where('apellidos', 'like', '%'.$apellido.'%')
            ->orWhere('nombres', 'like', '%'.$apellido.'%')
            ->orWhere('identificacion', 'like', '%'.$apellido.'%')
            ->get();

        return response()->json($clientes);
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
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->fill($request->post())->save();
        return response()->json(['cliente' => $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json(['mensaje' => 'Se eliminó']);
    }
}
