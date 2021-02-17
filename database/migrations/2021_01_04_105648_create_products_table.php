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
            $table->id();
            $table -> string('name');
            $table -> string('price');
            $table -> string('p_name') -> nullable();
            $table -> string('p_code') -> nullable();
            $table -> string('p_color') -> nullable();
            $table -> text('description');
            $table -> text('content');
            $table -> string('feature_image_path') -> nullable();
            $table -> string('feature_image_name') -> nullable();
            $table -> integer('category_id');
            $table -> integer('user_id');
            $table -> integer('views_count');
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
