<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewAdminController extends Controller
{
	//
	public function index()
	{
		$Reviews = Review::all();
		return view('admin.Review.index', compact('Reviews'));
	}
	public function destroy($id)
	{
		$Review = Review::findOrFail($id);
		$Review->delete();
		return redirect()->route('adminReview')->with('success', 'Review đã được xóa');
	}
}
