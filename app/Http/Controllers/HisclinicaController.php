<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hclinica;

class HisclinicaController extends Controller
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
    public function store(Request $request, Hclinica $hclinica)
    {
       
      $hclinica = Hclinica::create($request->all()); 
        return response()->json($hclinica);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bcedula)
    {
       
       $hcliente = Hclinica::where('identificacion', $bcedula)->firstOrFail();
      
       return response()->json($hcliente);
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
    public function update(Request $request, Hclinica $hclinica)
    {
        $hclinica->fill($request->post())->save();
        return response()->json(['hclinica'=>$hclinica]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hclinica $hclinica)
    {
        $hclinica->delete();
        return response()->json(['mensaje'=>'Se eliminó']);
    }
}
