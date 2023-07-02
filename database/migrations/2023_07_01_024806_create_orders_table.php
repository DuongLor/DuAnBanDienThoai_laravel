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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
						$table->unsignedBigInteger('user_id');
						$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
						$table->unsignedBigInteger('product_id');
						$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
						$table->unsignedBigInteger('payment_method_id');
						$table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
						$table->date('order_date');
						$table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};