<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fisioterapia;
use App\Models\cliente;

class FisioterapiaController extends Controller
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
    public function store(Request $request)    {
     
          

            $request->validate([
            'cliente_id' => 'required',
                                   
        ]);
      $Fisioterapia = Fisioterapia::create($request->all()); 
        return response()->json($Fisioterapia);
        }
        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $clifisio = Fisioterapia::with('cliente')->where('cliente_id', $id)->orderby('created_at', 'desc')->get();
      
       return response()->json($clifisio);
    }

    public function fetch($id)
    {
        $registro = Fisioterapia::where('id', $id)->firstOrFail();
      
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
       $fisioreg = Fisioterapia::find($id);
       $fisioreg->delete();
       
    }
}
