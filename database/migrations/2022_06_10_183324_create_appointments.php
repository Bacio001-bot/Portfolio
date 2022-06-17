<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agenda_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('treatment_id');
            $table->timestamps();

            $table->foreign('agenda_id')->references('id')->on('agendas');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('treatment_id')->references('id')->on('treatments');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
