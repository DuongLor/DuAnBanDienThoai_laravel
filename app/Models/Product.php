<?php

namespace App\Models;

use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
	use HasFactory;
	protected $fillable = [
		'category_id',
		'brand_id',
		'name',
		'thumbnail',
		'description',
		'is_active',
	];
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}
	public function colors()
	{
		return $this->belongsToMany(Color::class, 'product_color')->withPivot('price', 'quantity', 'discount');
	}
	public function slide()
	{
		return $this->belongsTo(Slide::class);
	}
	public function specifications()
	{
		return $this->hasMany(Specification::class);
	}
	public function promotion()
	{
		return $this->belongsTo(Promotion::class);
	}
	public function reviews()
	{
		return $this->hasMany(Review::class);
	}
	public function images()
	{
		return $this->hasMany(Image::class);
	}
	public function carts()
	{
		return $this->belongsToMany(Cart::class, 'product_cart', 'product_id', 'cart_id')->withPivot('unit_price', 'quantity', 'discount', 'total_price');
	}
}
