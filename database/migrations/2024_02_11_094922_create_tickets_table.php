<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id("id_tik");
            $table->foreignId('id_inter')->nullable()
                                        ->references('id_inter')->on('interventions')
                                        ->constrained();
            $table->foreignId('id_tpb')->references('id_tpb')->on('type_problemes')
                                        ->constrained();
            $table->foreignId('id_pers')->references('id_pers')->on('personnels')
                                        ->constrained();
            $table->string('path_tik',100)->nullable();
            $table->date('date_tik');
            $table->string('etat_tik',50)->default("Pas encore attribué")
                                        ->nullable();
            $table->string('urgence_tik');
            $table->string('poste_tik',10);
            $table->text('desc_tik');
            $table->string('precision_tik',20)->nullable();
            
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
        Schema::dropIfExists('tickets');
    }
}
