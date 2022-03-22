<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencesSpecialistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competences_specialistes', function (Blueprint $table) {
            $table->id();
        $table->foreignId("competence_id")->nullable()
                                        ->constrained("competences","id_comp");
        $table->foreignId("specialiste_id")->nullable()
                                            ->constrained("specialistes","id_spec");

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
        Schema::dropIfExists('competences_specialistes');
    }
}
