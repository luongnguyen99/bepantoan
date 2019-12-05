<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',191)->unique();
            $table->string('slug',191)->unique();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
