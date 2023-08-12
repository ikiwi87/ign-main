<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug_title')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->longText('info')->nullable();
            $table->date('date')->nullable();
            $table->string('client')->nullable();
            $table->string('link')->nullable();
            $table->integer('highlight')->nullable()->default(0);
            $table->integer('project_type_id')->unsigned()->nullable();
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
