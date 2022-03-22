<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialistes', function (Blueprint $table) {
            $table->id('id_spec');
            $table->foreignId("id_user")->nullable()
                                        ->constrained('users');
            $table->string('login_spec');
            $table->string('password_spec');
            $table->boolean('responsable_spec');
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
        Schema::dropIfExists('specialistes');
    }
}
