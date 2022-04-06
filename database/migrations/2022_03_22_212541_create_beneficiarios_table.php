<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('genero', ['M', 'F']);
            $table->date('data_nascimento');
            $table->string('numero_telefone');
            $table->string('tipo_documento');
            $table->string('numero_documento')->unique();
            $table->string('nome_mercado');
            $table->string('tipo_actividade');
            $table->date('ano_inicio');
            $table->boolean('inss');
            $table->boolean('empresa');
            $table->string('nome_empresa');
            $table->string('doc_link');
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
        Schema::dropIfExists('beneficiarios');
    }
}
