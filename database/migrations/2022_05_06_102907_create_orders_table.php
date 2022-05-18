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
            $table->foreignId("courses_id")->constrained(); // saco los datos del profesor de la tabla de cursos
            $table->boolean('status')->default(false);
            $table->timestamps();

            /*------------------*/
            $table->unsignedBigInteger('user_id_alumno'); // id_Alumno
            $table->unsignedBigInteger('user_id_profesor'); // id_Alumno

            $table->foreign('user_id_alumno')->references('id')->on('users'); // referencia id_Alumno
            $table->foreign('user_id_profesor')->references('id')->on('users'); // referencia id_Profesor
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
