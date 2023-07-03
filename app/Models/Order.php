<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;
	public function products()
	{
		return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function paymentMethod()
	{
		return $this->belongsTo(PaymentMethod::class);
	}
}
