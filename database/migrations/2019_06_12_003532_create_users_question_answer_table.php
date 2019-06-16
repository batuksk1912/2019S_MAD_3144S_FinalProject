<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_question_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('was_right')->default("0");

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');


            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers');

            $table->text('session_id');

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
        Schema::dropIfExists('users_question_answers');
    }
}
