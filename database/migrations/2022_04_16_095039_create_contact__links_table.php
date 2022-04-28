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
        // Links de Contacto(usuario)
        Schema::create('contact__links', function (Blueprint $table) {
            $table->id();
            $table->foreignId("users_id")->constrained();
            $table->string('link_red_social');
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
        Schema::dropIfExists('contact__links');
    }
};
