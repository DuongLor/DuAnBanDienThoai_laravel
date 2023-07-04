<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	use HasFactory;
	public function products()
	{
		return $this->belongsToMany(Product::class, 'slide_product', 'slide_id', 'product_id');
	}
}
