<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
	use HasFactory;
	protected $table = 'product_cart';
	protected $fillable = [
		'product_id',
		'cart_id',
		'unit_price',
		'quantity',
		'discount',
		'total_price',
		'color_id',
	];
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
	public function cart()
	{
		return $this->belongsTo(Cart::class);
	}
}
