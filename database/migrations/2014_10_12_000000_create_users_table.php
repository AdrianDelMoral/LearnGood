<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role_id')->nullable();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('ciudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('descripcion')->nullable();

            $table->timestamps();

            //      /* Tablas que usará solo profesor */
            //      // tabla de precios
            //      $table->int('precios')->nullable();

            //      // tabla redes Sociales
            //      $table->string('redes_sociales')->nullable();
            //      // tabla especialidades
            //      $table->string('especialidades')->nullable();
            //      // tabla alumnos
            //      $table->string('solicitudes_de_alumnos')->nullable();

            //      /* Tablas que usará solo alumno */
            //      $table->string('links_de_contacto')->nullable();

        });
    }

    /**
     * Reverse the migrations. *
     * @return void
     */

    public function down() {
        Schema::dropIfExists('users');
    }
};
