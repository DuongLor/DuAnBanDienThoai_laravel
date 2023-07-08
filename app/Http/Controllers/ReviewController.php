<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $review = new Review();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::id();
        $review->save();
        return redirect()->route('detail',['id' => $request->product_id,'#review-'.$review->id]);
    }
}
