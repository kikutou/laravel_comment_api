<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
          $table->increments('id');

          $table->unsignedInteger('site_id');
          $table->foreign('site_id')->references('id')->on('sites');

          $table->text('item_code')->nullable();
          $table->text('title')->nullable();
          $table->text('note');
          $table->integer('max')->default(5);
          $table->integer('mini')->default(1);
          $table->softDeletes();
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
        Schema::dropIfExists('items');
    }
}
