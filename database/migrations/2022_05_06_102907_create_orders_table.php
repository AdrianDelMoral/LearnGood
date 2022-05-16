<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("prices_id")->constrained(); // saco los datos del profesor de la tabla deprecios
            $table->boolean('status')->default(0);
            $table->timestamps();

            /*------------------*/
            $table->unsignedBigInteger('user_id_alumno'); // id_Alumno

            $table->foreign('user_id_alumno')->references('id')->on('users'); // referencia id_Alumno
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
