<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
	use HasFactory;
	protected $table = 'specifications';
	protected $fillable = [
		'product_id','name','value'
	];
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
