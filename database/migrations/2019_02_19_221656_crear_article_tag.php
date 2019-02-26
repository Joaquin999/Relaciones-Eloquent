<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearArticleTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('article_tag', function (Blueprint $table) {
        $table->integer('article_id')->unsigned();
        $table->integer('tag_id')->unsigned();

      });

      Schema::table('article_tag', function($table) {
         $table->foreign('article_id')->references('id')->on('articles');
         $table->foreign('tag_id')->references('id')->on('tags');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
