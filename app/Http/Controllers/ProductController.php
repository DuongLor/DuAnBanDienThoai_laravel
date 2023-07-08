<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // detail
    public function detail(string $id)
    {
        $product = Product::find($id);
        $brand = $product->brand;
        $colors = $product->colors;
        $product_images = $product->images;
       
        // newest review
        $reviews = $product->reviews->sortByDesc('created_at');
        $specifications = $product->specifications;
        $related = $brand->products()->where('id', '!=', $id)->take(4)->get();
        $hasPurchased = false;
        if(Auth::check()){
            $hasPurchased = DB::table('product_order')
            ->join('orders', 'product_order.order_id', '=', 'orders.id')
            ->where('product_order.product_id', $id)
            ->where('orders.user_id', Auth::id())
            ->exists();
            $reviewed = Review::where('product_id', $id)->where('user_id', Auth::id())->exists();
        }
        return view('client.detail',compact('product','brand','colors','product_images','specifications','reviews','hasPurchased','reviewed','related'));
    }
   
}
