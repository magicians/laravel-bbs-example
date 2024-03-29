<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('thread_id');
            $table->timestamps();
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('thread_id')->references('id')->on('threads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_thread_id_foreign');
        });
        Schema::drop('comments');
    }
}
