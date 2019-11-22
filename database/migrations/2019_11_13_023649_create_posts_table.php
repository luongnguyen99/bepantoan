<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',191);
            $table->string('slug',191)->unique();
            $table->string('short_desc',191)->nullable();
            $table->text('content')->nullable();
            $table->string('image',191)->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('post_category_id')->nullable()->unsigned();
            $table->foreign('post_category_id')->references('id')->on('post_categories')->onDelete('set null');
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
        Schema::dropIfExists('posts');
    }
}
