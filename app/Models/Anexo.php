<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;
    protected $fillable = [
        "cliente_id",
        "descripcion",
        "rutaarchivo",
       
    ];

    public function cliente(){

        return $this->belongsTo(Cliente::class);

   }
}
