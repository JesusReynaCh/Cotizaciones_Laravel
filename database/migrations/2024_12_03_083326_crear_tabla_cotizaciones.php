<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCotizaciones extends Migration
{
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('servicio_id');
            $table->decimal('costo', 10, 2);
            $table->integer('cantidad');
            $table->decimal('total', 10, 2);
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}