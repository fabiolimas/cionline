<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrespondenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('correspondencias', function (Blueprint $table) {
        $table->bigIncrements('id'); // equivalente ao bigIncrements('id')
        $table->foreignId('loja_id')->constrained('lojas')->onDelete('cascade');
        $table->integer('loja_origem');
        $table->integer('loja_destinatario');
        $table->string('funcionario_origem');
        $table->string('funcionario_destinatario');
        $table->date('data_envio')->nullable();
        $table->date('data_recebimento')->nullable();
        $table->string('status');
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
        Schema::dropIfExists('correspondencias');
    }
}
