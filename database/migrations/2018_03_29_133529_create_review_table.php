<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('reviews', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('game_id');
             $table->integer('user_id');
             $table->longText('opinion')->nullable();
             $table->integer('upvote')->nullable();
             $table->integer('downvote')->nullable();
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
        Schema::dropIfExists('review');
    }
}
