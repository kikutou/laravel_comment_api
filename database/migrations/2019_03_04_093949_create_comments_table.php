<?php

use Illuminate\Support\Facades\Schema;
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
      Schema::create('comments', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('site_id');
        $table->foreign('site_id')->references('id')->on('sites');
        $table->unsignedInteger('topic_id');
        $table->foreign('topic_id')->references('id')->on('topics');
        $table->text('content');
        $table->text('user_code')->nullable();
        $table->timestamps();
        $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
