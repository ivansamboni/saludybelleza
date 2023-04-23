<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisioterapia extends Model
{
    use HasFactory;
    protected $fillable = [
        "cliente_id",
        "hombroflexion",
        "hombroextencion",
        "hombroabd",
        "hombroadd",
        "rotaexterna",
        "rotainterna",
        "codoflexion",
        "codoextencion",
        "antbrazoexterna",
        "antbrazointerna",
        "desviacionflexion",
        "desviacionexterna",
        "flxcadera",
        "extcadera",
        "rodillaflex",
        "rodillaext",
        "caderaabd",
        "caderaadd",
        "flexplant",
        "flexdors",
        "palmar",
        "dorsal",
        "indicemcf",
        "indiceifp",
        "indiceifd",
        "indiceabd",
        "mediomcf",
        "medioifp",
        "medioifd",
        "medioabd",
        "anularmcf",
        "anularifp",
        "anularifd",
        "anularabd",
        "meniquemcf",
        "meniqueifp",
        "meniqueifd",
        "meniqueabd",
        "pulgarmcf",
        "pulgarifp",
        "pulgarifd",
        "pulgarabd",
        "rotatobiext",
        "rotatobiint",
        "tobilloinv",
        "tobilloeve",
    ];

    public function cliente(){

        return $this->belongsTo(Cliente::class);

   }
}
