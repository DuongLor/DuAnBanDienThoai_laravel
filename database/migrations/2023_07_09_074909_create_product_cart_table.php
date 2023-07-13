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
		Schema::create('product_cart', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->unsignedBigInteger('cart_id');
			$table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
			$table->integer('color_id');
			$table->decimal('unit_price', 10, 0);
			$table->decimal('discount', 10, 0)->nullable();
			$table->integer('quantity');
			$table->decimal('total_price', 10, 0);
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
		Schema::dropIfExists('product_cart');
	}
};
