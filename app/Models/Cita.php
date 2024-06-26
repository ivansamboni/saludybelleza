<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        "cliente_id",
        "fechacita",
        "descripcion"
    ];

    public function cliente()
    {

        return $this->belongsTo(Cliente::class);
    }
}
