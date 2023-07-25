<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandAdminController extends Controller
{
	//
	public function index()
	{
		$brands = Brand::all();
		return view('admin.brand.index', compact('brands'));
	}
	public function create()
	{
		return view('admin.brand.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
		]);
		$brand = new Brand();
		if ($request->hasFile('logo')) {
			$request->validate([
				'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$logo = $request->file('logo');
			$newName = time() . "." . $logo->getClientOriginalExtension();
			$logo->move(public_path('uploads'), $newName);
			$brand->logo = $newName;
		}
		$brand->name = $request->name;
		$brand->save();
		return redirect()->route('adminBrand')->with('success', 'Brand đã được thêm');
	}
	public function edit($id)
	{
		$brand = Brand::findOrFail($id);
		return view('admin.brand.edit', compact('brand'));
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
		]);
		$brand = Brand::findOrFail($id);
		if ($request->hasFile('logo')) {
			$request->validate([
				'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$logo = $request->file('logo');
			$newName = time() . "." . $logo->getClientOriginalExtension();
			$logo->move(public_path('uploads'), $newName);
			$brand->logo = $newName;
		}
		$brand->name = $request->name;
		$brand->save();
		return redirect()->route('adminBrand')->with('success', 'Brand đã được cập nhật');
	}
	public function destroy($id)
	{
		$brand = Brand::findOrFail($id);
		$brand->delete();
		return redirect()->route('adminBrand')->with('success', 'Brand đã được xóa');
	}
}
