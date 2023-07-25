<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorAdminController extends Controller
{
	//public function index()
	public function index()
	{
		$colors = Color::all();
		return view('admin.Color.index', compact('colors'));
	}
	public function create()
	{
		return view('admin.color.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
		]);
		$Color = new Color();
		$Color->name = $request->name;
		$Color->save();
		return redirect()->route('adminColor')->with('success', 'Color đã được thêm');
	}
	public function edit($id)
	{
		$Color = Color::findOrFail($id);
		return view('admin.Color.edit', compact('Color'));
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
		]);
		$Color = Color::findOrFail($id);
		if ($request->hasFile('logo')) {
			$request->validate([
				'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$logo = $request->file('logo');
			$newName = time() . "." . $logo->getClientOriginalExtension();
			$logo->move(public_path('uploads'), $newName);
			$Color->logo = $newName;
		}
		$Color->name = $request->name;
		$Color->save();
		return redirect()->route('adminColor')->with('success', 'Color đã được cập nhật');
	}
	public function destroy($id)
	{
		$Color = Color::findOrFail($id);
		$Color->delete();
		return redirect()->route('adminColor')->with('success', 'Color đã được xóa');
	}
}
