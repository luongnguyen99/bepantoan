<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191)->unique();
            $table->string('slug',191)->unique();
            $table->bigInteger('parent_id')->nullable()->default(0)->unsigned();
            $table->string('image',191)->nullable();
            $table->string('seo_title',191)->nullable();
            $table->string('seo_keyword',191)->nullable();
            $table->string('seo_description',191)->nullable();
            $table->tinyInteger('block_robot_google')->default(0)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
