<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name', 256);
            $table->text('description');
            $table->string('image');
            $table->string('article', 32);
            $table->unsignedBigInteger('manufacturer_id');
            $table->foreign('manufacturer_id', 'product_manufacturerFK')->on('product_manufacturers')->references('id');
            $table->string('manufacturer_country', 256);
            $table->string('material', 256);
            $table->decimal('weight', 10, 2)->unsigned();
            $table->decimal('price', 10, 2)->unsigned();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'product_categoryFK')->on('product_categories')->references('id');
            $table->timestamps();
            $table->softDeletes();
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
};
