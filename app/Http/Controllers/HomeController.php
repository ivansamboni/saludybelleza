<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Registro;
use App\Models\Fisioterapia;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexpdf($id)
    {

        $cliente = Cliente::where('id', $id)->firstOrFail();
        $fisioterapia = Fisioterapia::all()->where('cliente_id', $id);
        $registro = Registro::all()->where('cliente_id', $id);

        $pdf = Pdf::loadView('pdf', compact('cliente', 'fisioterapia','registro'));
        return $pdf->stream();
    }
}
