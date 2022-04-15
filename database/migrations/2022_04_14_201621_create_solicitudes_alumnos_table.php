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
        Schema::create('solicitudes_alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('id_profesor');
            $table->foreignId("user_id")->constrained();
            $table->string('id_alumno')->nullable();
            $table->boolean('estado_pago')->default(null);
            /* $table->string('estado_de_pago'); */
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
        Schema::dropIfExists('solicitudes_alumnos');
    }
};
