<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;
	protected $fillable = [
		'category_id',
		'brand_id',
		'name',
		'price',
		'description',
		'image',
		'status',
		'view',
		'created_at',
		'updated_at',
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
		return $this->belongsToMany(Color::class, 'color_product');
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
}
