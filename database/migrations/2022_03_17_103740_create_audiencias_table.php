<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiencias', function (Blueprint $table) {
            $table->id();
            $table->string("numero")->unique();
            $table->string("solicitante");
            $table->text("assunto");
            $table->date("data_marcacao");
            $table->text("gabinete");

            $table->String('contacto')->nullable();
            $table->date('data_atendimento')->nullable();
            $table->String('desfecho')->nullable();
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
        Schema::dropIfExists('audiencias');
    }
}
