<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191);
            $table->string('slug',191)->unique();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->bigInteger('price')->nullable();
            $table->bigInteger('sale_price')->nullable();
            $table->text('gift')->nullable();
            $table->text('description')->nullable();
            $table->text('infomation_detail')->nullable();
            $table->text('specifications')->nullable();
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('products');
    }
}
