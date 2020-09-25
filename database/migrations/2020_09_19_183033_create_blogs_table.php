<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blog_id');
            $table->string('name');
            $table->string('description');
            $table->string('banner_image')->default(0);
            $table->string('bannerimgpath')->default(0);
            $table->bigInteger('blogcategoryid')->unsigned();
            $table->foreign('blogcategoryid')->references('categoryid')->on('blogcategories');
            $table->string('main_image')->default(0);
            $table->string('mainimgpath')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
