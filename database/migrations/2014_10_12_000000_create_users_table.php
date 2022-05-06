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
            $table->string('idioma')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->timestamps();

            //      /* Tablas que usará solo profesor */

            // alumnos
                // $table->string('alumnos')->nullable();

            // profesores
                // $table->string('solicitudes_de_alumnos')->nullable();
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
