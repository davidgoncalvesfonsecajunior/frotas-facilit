<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservabusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservabuses', function (Blueprint $table) {

            $table->id();

            $table->string('local_saida');
            $table->string('local_destino');

            $table->dateTime('data_saida');
            $table->dateTime('data_retorno');
            $table->dateTime('data_chegada');

            $table->Integer('Passageiros');
            $table->Integer('km');
            $table->string('finalidade');

            $table->string('diaria');
            $table->string('motorista');

            $table->string('nome_local');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('uf');
            $table->string('contato');
            $table->string('email');
            $table->string('estacionamento');
            $table->string('roteiro');
            $table->string('objetivo');

            $table->string('disciplinas')->nullable();
            $table->string('publico');
            $table->string('servidores');

            $table->string('check')->nullable();


            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('owner_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('reservabuses');
    }
}
