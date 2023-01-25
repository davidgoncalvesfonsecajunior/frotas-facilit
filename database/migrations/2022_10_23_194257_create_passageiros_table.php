<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassageirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passageiros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('rg');
            $table->string('orgao_expedidor');
            $table->string('poltrona');

            $table->foreignId('reservabus_id')
                ->nullable()
                ->constrained('reservabuses')
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
        Schema::dropIfExists('passageiros');
    }
}
