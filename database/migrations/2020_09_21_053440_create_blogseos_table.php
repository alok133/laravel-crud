<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogseosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogseos', function (Blueprint $table) {
            $table->id('seo_id');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keyword');
            $table->integer('blog_id');
            $table->boolean('index')->default(false);
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
        Schema::dropIfExists('blogseos');
    }
}
