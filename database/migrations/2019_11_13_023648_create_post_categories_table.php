<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191)->unique();
            $table->string('slug',191)->unique();
            $table->string('seo_title',191)->nullable();
            $table->string('seo_keyword',191)->nullable();
            $table->string('seo_description',191)->nullable();
            $table->tinyInteger('block_robot_google')->default(-1)->nullable();
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
        Schema::dropIfExists('post_categories');
    }
}
