<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hclinica extends Model
{
    use HasFactory;
    protected $fillable = ["cliente_id", "altura",  "peso",  "signofc",  "signofr",  "signopasistolica", "signopadiastolica",  "diabetes",  "alergia",
    "hta",  "cancer",  "transfunsiones",  "enfreumaticas",  "encames",  "accidentes",  "cardiopatias",  "cirugias",   "fdiabetes",
    "falergia",  "fhta",  "fcancer",  "ftransfusiones",  "fenfreumaticas",  "fencames",  "faccidentes",  "fcardiopatias",  "fcirugias",
    "antfarmacologicos",  "antalergicos",  "antquirurgicos",  "tratamedicoactual", "cicaquirurgica", "estparaclinicos", "seevidencia", "diagmedico"

];


}
