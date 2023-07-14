<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;
	protected $table = 'orders';
	protected $fillable = [
		'user_id','payment_method_id','order_date','total_amount','contact_information','status'
	];
	public function products()
	{
		return $this->belongsToMany(Product::class, 'product_order', 'order_id', 'product_id');
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function paymentMethod()
	{
		return $this->belongsTo(PaymentMethod::class);
	}

	public function productOder(){
		return $this->hasMany(ProductOrder::class);
	}
}
