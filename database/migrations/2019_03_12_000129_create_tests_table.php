<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type'); // 1 - Automatizado, 2 - Manual
            $table->text('description');
            $table->text('technologies');
            $table->date('date_init');
            $table->date('date_end');
            $table->text('results');
            $table->integer('status')->default(1); // 1 - Em aberto, 2 - Finalizada
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
        Schema::dropIfExists('tests');
    }
}
