<?php

namespace App\Http\Controllers;
use App\Mail\alertaMail;
use App\Mail\CitasMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CorreoController extends Controller
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
        $usuariomail = $request->correo;
        $contenido = $request->validate([
            
            'nombre' => 'required', 
            'apellido' => 'required',           
            'fecha' => 'required'
            
        ]);

        Mail::to($usuariomail)->send(new alertaMail($contenido));
    }

    public function correocita(Request $request)
    {
       
        $usuariomail = $request->correo;
        $contenido = $request->validate([
            
            'nombre' => 'required', 
            'apellido' => 'required',           
            'fecha' => 'required'
            
        ]);

        Mail::to($usuariomail)->send(new CitasMail($contenido));
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
    }
}
