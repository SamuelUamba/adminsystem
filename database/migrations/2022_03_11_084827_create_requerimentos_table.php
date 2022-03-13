<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimentos', function (Blueprint $table) {
            $table->id();
            $table->string("numero")->unique();
            $table->string("requerente");
            $table->text("assunto");
            $table->dateTime("data_entrada");
            $table->text("observacao")->nullable();;
            $table->dateTime('data_despacho')->nullable();
            $table->String('tipo_despacho')->nullable();
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
        Schema::dropIfExists('requerimentos');
    }
}
