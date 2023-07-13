<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$cart = Cart::where('user_id', Auth::user()->id)->first();
		$product_cart = ProductCart::where('cart_id', $cart->id)->get();
		return view('client.cart.index', compact('product_cart'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
		$user_id = Auth::user()->id;
		$cart = Cart::where('user_id', $user_id)->get();
		if (count($cart) == 0) {
			$cart = new Cart();
			$cart->user_id = $user_id;
			$cart->save();
		}
		$product_cart_where = ProductCart::where('cart_id', $cart->first()->id)->where('product_id', $request->product_id)->where('color_id', $request->color_id)->first();
		if ($product_cart_where) {
			$quantity = $product_cart_where->quantity + $request->quantity;
			$product_cart_where->update(['quantity' => $quantity]);
		} else {
			$product_cart = new ProductCart();
			$product_cart->product_id = $request->product_id;
			$product_cart->cart_id = $cart->first()->id;
			$product_cart->unit_price = $request->unit_price;
			$product_cart->quantity = $request->quantity;
			$product_cart->color_id = $request->color_id;
			$product_cart->discount = $request->discount;
			$product_cart->total_price = 	$request->unit_price * $request->quantity;
			$product_cart->save();
		}
		return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
		$product_cart = ProductCart::find($id);
		$product_cart->quantity = $request->quantity;
		$product_cart->total_price = $product_cart->unit_price * $request->quantity;
		$product_cart->save();
		return response()->json(['total_price' => $product_cart->total_price]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
		$product_cart = ProductCart::find($id);
		$product_cart->delete();
		return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
	}
}
