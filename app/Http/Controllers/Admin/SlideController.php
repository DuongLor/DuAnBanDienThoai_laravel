<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
	//
	public function index()
	{
		$Slides = Slide::all();
		return view('admin.slide.index', compact('Slides'));
	}
	public function create()
	{
		return view('admin.slide.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
		]);
		$Slide = new Slide();
		if ($request->hasFile('image')) {
			$request->validate([
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$image = $request->file('image');
			$newtitle = time() . "." . $image->getClientOriginalExtension();
			$image->move(public_path('uploads'), $newtitle);
			$Slide->image = $newtitle;
		}
		$Slide->title = $request->title;
		$Slide->save();
		return redirect()->route('adminSlide')->with('success', 'Slide đã được thêm');
	}
	public function edit($id)
	{
		$Slide = Slide::findOrFail($id);
		return view('admin.Slide.edit', compact('Slide'));
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required',
		]);
		$Slide = Slide::findOrFail($id);
		if ($request->hasFile('image')) {
			$request->validate([
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$image = $request->file('image');
			$newtitle = time() . "." . $image->getClientOriginalExtension();
			$image->move(public_path('uploads'), $newtitle);
			$Slide->image = $newtitle;
		}
		$Slide->title = $request->title;
		$Slide->save();
		return redirect()->route('adminSlide')->with('success', 'Slide đã được cập nhật');
	}
	public function destroy($id)
	{
		$Slide = Slide::findOrFail($id);
		$Slide->delete();
		return redirect()->route('adminSlide')->with('success', 'Slide đã được xóa');
	}
}
