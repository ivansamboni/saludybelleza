<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Membresia;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membresia = Membresia::all();
        return response()->json($membresia);
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
    public function store(Request $request, Membresia $membresia)
    {
        $request->validate([
            'nombre' => 'required',
            'dias' => 'required',
            'precio' => 'required',
                       
        ]);
      $membresia = Membresia::create($request->all()); 
        return response()->json($membresia);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Membresia $membresia)
    {
        return response()->json($membresia);
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
    public function update(Request $request, Membresia $membresia)
    {
        $membresia->fill($request->post())->save();
        return response()->json(['membresia'=>$membresia]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membresia $membresia)
    {
        $membresia->delete();
        return response()->json(['mensaje'=>'Se eliminó']);
    }
}
