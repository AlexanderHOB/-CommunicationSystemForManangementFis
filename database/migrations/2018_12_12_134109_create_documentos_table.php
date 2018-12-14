<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtipodocumento')->unsigned();
            $table->integer('idproceso')->unsigned();
            $table->string('nombre',100);
            $table->string('descripcion',256)->nullable();
            $table->string('ubicacion',256)->nullable();
            $table->boolean('condicion')->default(1);
            $table->timestamps();
            

            $table->foreign('idtipodocumento')->references('id')->on('tipoDeDocumentos');
            $table->foreign('idproceso')->references('id')->on('procesos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
