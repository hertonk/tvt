<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description');

            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');

            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('group_tasks');

            $table->date('date_init');
            $table->date('date_end');

            $table->integer('complexity'); // 1- Baixa, 2- Média, 3-Alta
            $table->integer('progress');
            $table->integer('status'); // 1- Em andamento, 2- Cancelada, 3-Bloqueada, 4-Finalizada

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
        Schema::dropIfExists('tasks');
    }
}
