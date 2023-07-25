<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAdminController extends Controller
{
	//
	public function index()
	{
		$Products = Product::all();
		return view('admin.product.index', compact('Products'));
	}
	public function create()
	{
		$Brands = Brand::all();
		return view('admin.Product.create', compact('Brands'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'brand_id' => 'required',
			'description' => 'required',
		]);
		$Product = new Product();
		if ($request->hasFile('thumbnail')) {
			$request->validate([
				'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$thumbnail = $request->file('thumbnail');
			$newName = time() . "." . $thumbnail->getClientOriginalExtension();
			$thumbnail->move(public_path('uploads'), $newName);
			$Product->thumbnail = $newName;
		}
		$Product->name = $request->name;
		$Product->brand_id = $request->brand_id;
		$Product->description = $request->description;
		$Product->save();
		return redirect()->route('adminProduct')->with('success', 'Product đã được thêm');
	}
	public function edit($id)
	{
		$Product = Product::findOrFail($id);
		$Brands = Brand::all();
		return view('admin.Product.edit', compact('Product', 'Brands'));
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
			'brand_id' => 'required',
			'description' => 'required',
		]);
		$Product = Product::findOrFail($id);
		if ($request->hasFile('thumbnail')) {
			$request->validate([
				'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$thumbnail = $request->file('thumbnail');
			$newName = time() . "." . $thumbnail->getClientOriginalExtension();
			$thumbnail->move(public_path('uploads'), $newName);
			$Product->thumbnail = $newName;
		}
		$Product->name = $request->name;
		$Product->brand_id = $request->brand_id;
		$Product->description = $request->description;
		$Product->save();
		return redirect()->route('adminProduct')->with('success', 'Product đã được cập nhật');
	}
	public function destroy($id)
	{
		$Product = Product::findOrFail($id);
		$Product->delete();
		return redirect()->route('adminProduct')->with('success', 'Product đã được xóa');
	}
}
