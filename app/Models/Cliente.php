<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombres","apellidos","tipodocumento", "identificacion", "genero",
        "estadocivil", "nacimiento", "edad", "direccion", "telefono","notificado",
        "ocupacion", "otrotelefono", "correo", "observacion", "estadoactivo","altura",  "peso",  "signofc",  "signofr",  "signopasistolica", "signopadiastolica",  "diabetes",  "alergia",
        "hta",  "cancer",  "transfunsiones",  "enfreumaticas",  "encames",  "accidentes",  "cardiopatias",  "cirugias",   "fdiabetes",
        "falergia",  "fhta",  "fcancer",  "ftransfusiones",  "fenfreumaticas",  "fencames",  "faccidentes",  "fcardiopatias",  "fcirugias",
        "antfarmacologicos",  "antalergicos", "antquirurgicos", "marchalibre", "marchaclaudicante",
        "escala1", "escala2", "escala3", "escala4", "escala5", "escala6", "escala7", "escala8", "escala9", "escala10",
         "marchaayuda", "marchaespasticas", "marchaataxica","marchaotros" ,"tratamedicoactual", "cicaquirurgica", "estparaclinicos", "seevidencia", "diagmedico","anteceotros",
         "fanteceotros","escaladolor",
         
    ];


    public function visita()
    {

        return $this->hasMany(Visita::class);
    }

    public function fisioterapia()
    {

        return $this->belongsTo(Fisioterapia::class);
    }
   
}
