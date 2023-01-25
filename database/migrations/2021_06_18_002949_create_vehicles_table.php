<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('chassi')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->integer('ano');
            $table->string('cor');
            $table->string('combustivel');
            $table->string('km');
            $table->boolean('status');
            $table->string('observacao')->nullable();

            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('vehicles');
    }
}
