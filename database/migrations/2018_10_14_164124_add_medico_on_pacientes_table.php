<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMedicoOnPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('pacientes', function (Blueprint $table) {
//            $table->unsignedInteger('medico_id')->nullable();
//            $table->foreign('medico_id')->references('id')->on('medicos');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('pacientes', function (Blueprint $table) {
//            $table->dropForeign('pacientes_medico_id_foreign');
//        });
    }
}
