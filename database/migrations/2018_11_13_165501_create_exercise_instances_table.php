<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_instances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exercise_id');
            $table->unsignedInteger('day_id');
            $table->integer('duration');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->foreign('day_id')->references('id')->on('plans_days')->onDelete('cascade');

            $table->unique(['exercise_id', 'day_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_instances');
    }
}
