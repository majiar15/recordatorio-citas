<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Patient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cc')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('proxima_cita');
            $table->bigInteger('number')->unique();
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
        //
        Schema::dropIfExists('patient');
    }
}
