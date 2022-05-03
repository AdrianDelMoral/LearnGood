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
        // Redes Sociales
        Schema::create('socials', function (Blueprint $table) {
            /*
                $table->id();
                $table->foreignId("users_id")->constrained();
                $table->string('discord')->nullable();
                $table->string('linkedIn')->nullable();
                $table->string('twitter')->nullable();
                $table->timestamps();
            */
            $table->id();
            $table->foreignId("users_id")->constrained();
            $table->string('nombre_red_social')->nullable();
            $table->string('link')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::dropIfExists('socials');
    }
};
