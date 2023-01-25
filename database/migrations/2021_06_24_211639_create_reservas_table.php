<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_saida');
            $table->dateTime('data_retorno');
            $table->string('observacoes')->nullable();
            $table->boolean('check');
            $table->text('roteiro_viagem');
            $table->string('local_saida');
            $table->string('local_destino');

            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('owner_id')->nullable()->constrained('users')->cascadeOnDelete();

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
        Schema::dropIfExists('reservas');
    }
}
