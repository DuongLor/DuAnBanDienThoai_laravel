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
		Schema::create('product_order', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->unsignedBigInteger('order_id');
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->integer('quantity');
			$table->decimal('unit_price', 10, 0);
			$table->decimal('total_price', 10, 0)->nullable();
			$table->decimal('discount_price', 10, 0)->nullable();
			$table->integer('color_id');
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
		Schema::dropIfExists('product_order');
	}
};
