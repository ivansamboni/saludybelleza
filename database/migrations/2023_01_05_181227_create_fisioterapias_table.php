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
        Schema::create('fisioterapias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');           
            $table->string('hombroflexion')->nullable();
            $table->string('hombroextencion')->nullable();
            $table->string('hombroabd')->nullable();
            $table->string('hombroadd')->nullable();
            $table->string('rotaexterna')->nullable();
            $table->string('rotainterna')->nullable();
            $table->string('codoflexion')->nullable();
            $table->string('codoextencion')->nullable();
            $table->string('antbrazoexterna')->nullable();
            $table->string('antbrazointerna')->nullable();
            $table->string('desviacionflexion')->nullable();
            $table->string('desviacionexterna')->nullable();
            $table->string('palmar')->nullable();
            $table->string('dorsal')->nullable();

            $table->string('indicemcf')->nullable();
            $table->string('indiceifp')->nullable();
            $table->string('indiceifd')->nullable();
            $table->string('indiceabd')->nullable();

            $table->string('mediomcf')->nullable();
            $table->string('medioifp')->nullable();
            $table->string('medioifd')->nullable();
            $table->string('medioabd')->nullable();
            $table->string('anularmcf')->nullable();
            $table->string('anularifp')->nullable();
            $table->string('anularifd')->nullable();
            $table->string('anularabd')->nullable();
            $table->string('meniquemcf')->nullable();
            $table->string('meniqueifp')->nullable();
            $table->string('meniqueifd')->nullable();
            $table->string('meniqueabd')->nullable();
            $table->string('pulgarmcf')->nullable();
            $table->string('pulgarifp')->nullable();
            $table->string('pulgarifd')->nullable();
            $table->string('pulgarabd')->nullable();
            $table->string('flxcadera')->nullable();
            $table->string('extcadera')->nullable();
            $table->string('rodillaflex')->nullable();
            $table->string('rodillaext')->nullable();
            $table->string('caderaabd')->nullable();
            $table->string('caderaadd')->nullable();
            $table->string('flexplant')->nullable();
            $table->string('flexdors')->nullable();
            $table->string('rotatobiext')->nullable();
            $table->string('rotatobiint')->nullable();
            $table->string('tobilloinv')->nullable();
            $table->string('tobilloeve')->nullable();
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
        Schema::dropIfExists('fisioterapias');
    }
};
