<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	use HasFactory;
	protected $table = 'carts';
	protected $fillable = [
		'user_id',
		'product_id',
	];
	public function products()
	{
		return $this->belongsToMany(Product::class, 'product_cart', 'cart_id', 'product_id')->withPivot('unit_price', 'quantity', 'discount', 'total_price');
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function getBy($userId)
	{
		return Cart::whereUserId($userId)->first();
	}
	public function firtOrCreateBy($userId)
	{
		$cart = $this->getBy($userId);

		if (!$cart) {
			$cart = $this->cart->create(['user_id' => $userId]);
		}
		return $cart;
	}
}
