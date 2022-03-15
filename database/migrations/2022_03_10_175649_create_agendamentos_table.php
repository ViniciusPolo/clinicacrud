<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();   
            $table->date('data_consulta');
            $table->time('horario');
            $table->string('observacao');
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('paciente_id');
            $table->boolean('ativa')->default(1);
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('users');
            $table->foreign('paciente_id')->references('id')->on('pacientes');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
