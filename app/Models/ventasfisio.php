<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventasfisio extends Model
{
    use HasFactory;
    protected $fillable = [
        "cliente_id",
        "tipoventa",
        "precio"      
       
    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class);

   }
}
