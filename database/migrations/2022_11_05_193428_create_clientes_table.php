<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tipodocumento');
            $table->string('identificacion')->unique();
            $table->string('genero')->nullable();
            $table->string('notificado')->nullable();
            $table->string('estadocivil')->nullable();
            $table->string('nacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('otrotelefono')->nullable();
            $table->string('correo', 100)->unique()->nullable();
            $table->text('observacion', 1000)->nullable();
            $table->date('estadoactivo', 10)->nullable();
            $table->string('altura')->nullable();
            $table->string('peso')->nullable();
            $table->string('signofc')->nullable();
            $table->string('signofr')->nullable();
            $table->string('signopasistolica')->nullable();
            $table->string('signopadiastolica')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('alergia')->nullable();
            $table->string('hta')->nullable();
            $table->string('cancer')->nullable();
            $table->string('transfusiones')->nullable();
            $table->string('enfreumaticas')->nullable();
            $table->string('encames')->nullable();
            $table->string('accidentes')->nullable();
            $table->string('cardiopatias')->nullable();
            $table->string('cirugias')->nullable();
            $table->string('fdiabetes')->nullable();
            $table->string('falergia')->nullable();
            $table->string('fhta')->nullable();
            $table->string('fcancer')->nullable();
            $table->string('ftransfusiones')->nullable();
            $table->string('fenfreumaticas')->nullable();
            $table->string('fencames')->nullable();
            $table->string('faccidentes')->nullable();
            $table->string('fcardiopatias')->nullable();
            $table->string('fcirugias')->nullable();
            $table->string('antfarmacologicos')->nullable();
            $table->string('antalergicos')->nullable();
            $table->string('antquirurgicos')->nullable();
            $table->string('tratamedicoactual')->nullable();
            $table->string('cicaquirurgica')->nullable();
            $table->string('espasmoscm')->nullable();
            $table->string('marchalibre')->nullable();
            $table->string('marchaclaudicante')->nullable();
            $table->string('marchaayuda')->nullable();
            $table->string('marchaespasticas')->nullable();
            $table->string('marchaataxica')->nullable();
            $table->string('marchaotros')->nullable();
            $table->string('escaladolor')->nullable();
            $table->string('anteceotros')->nullable();
            $table->string('fanteceotros')->nullable();
            $table->string('estparaclinicos')->nullable();
            $table->text('seevidencia')->nullable();
            $table->text('diagmedico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
