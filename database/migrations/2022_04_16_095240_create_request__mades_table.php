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
        Schema::create('request__mades', function (Blueprint $table) {
            $table->id();
            $table->foreignId("students_id")->nullable()->constrained();
            $table->foreignId("teachers_id")->nullable()->constrained();
            $table->boolean('estado_pago');
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
        Schema::dropIfExists('request__mades');
    }
};
