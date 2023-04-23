<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anexo;
use Illuminate\Support\Facades\Storage;

class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('archivos'), $file_name);
        }

        $request->validate([
            'cliente_id' => 'required',
           
            'rutaarchivo' => 'required'
        ]);
        Anexo::create($request->all());
    }

    public function fetch($id)
    {
        $anexos = Anexo::where('id', $id)->firstOrFail();

        return response()->json($anexos);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $anexo = Anexo::with('cliente')->where('cliente_id', $id)->orderby('created_at', 'desc')->get();

        return response()->json($anexo);
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
        $cliente = Anexo::findOrfail($id);
        Anexo::destroy($id);
        $filePath = public_path('archivos/'.$cliente->rutaarchivo);
        unlink($filePath);
        
    }
   
}
