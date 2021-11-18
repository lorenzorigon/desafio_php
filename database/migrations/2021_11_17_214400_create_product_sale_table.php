<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('amount');
            $table->float('price');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('sale_id');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('sale_id')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_sale', function (Blueprint $table) {
            $table->dropForeign('product_sale_sale_id_foreign');
            $table->dropForeign('product_sale_product_id_foreign');
        });

        Schema::dropIfExists('product_sale');
    }
}
