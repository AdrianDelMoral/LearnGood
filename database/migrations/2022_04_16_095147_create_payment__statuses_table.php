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
        // Estados  de pago
        Schema::create('payment__statuses', function (Blueprint $table) {
            $table->id();
            $table->boolean('users_id')->nullable()->constrained();
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
        Schema::dropIfExists('payment__statuses');
    }
};
