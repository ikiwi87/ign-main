<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug_title')->nullable();
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->longText('content')->nullable();
            $table->double('highlight', 15, 8)->nullable()->default(0);
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->integer('author')->unsigned()->nullable();
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
}
