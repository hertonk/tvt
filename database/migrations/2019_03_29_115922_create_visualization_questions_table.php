<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisualizationQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visualization_questions', function (Blueprint $table) {

            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id')->references('id')
                ->on('questions')->onDelete('cascade');

            $table->integer('visualization_id')->unsigned()->nullable();
            $table->foreign('visualization_id')->references('id')
                ->on('visualizations')->onDelete('cascade');

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
        Schema::dropIfExists('visualization_questions');
    }
}
