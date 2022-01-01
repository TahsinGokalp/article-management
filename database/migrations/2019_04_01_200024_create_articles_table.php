<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->year('publication_year');
            $table->tinyInteger('type');
            $table->text('abstract');
            $table->string('file');
            $table->bigInteger('language_id')->unsigned();
            $table->bigInteger('added_by')->unsigned();
            $table->bigInteger('publication_place_id')->unsigned();
            $table->timestamps();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('publication_place_id')->references('id')->on('publication_places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
