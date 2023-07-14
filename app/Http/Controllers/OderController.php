<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;

class OderController extends Controller
{
	//
	public function index()
	{
		$cart = Cart::where('user_id', Auth::user()->id)->first();
		$product_cart = ProductCart::where('cart_id', $cart->id)->get();
		$payment_method = PaymentMethod::all();
		$user_address = Auth::user();
		return view('client.oder.index', compact('product_cart', 'payment_method', 'user_address'));
	}
	public function store(Request $request)
	{
		$request->validate([
			'contact_information' => 'required',
			'paymentMethod' => 'required',
			'total_amount' => 'required',
		]);
		$user_id = Auth::user()->id;
		$oder_date = now();
		$order = new Order();
		$order->user_id = $user_id;
		$order->payment_method_id = $request->paymentMethod;
		$order->order_date = $oder_date;
		$order->total_amount = $request->total_amount;
		$order->contact_information = $request->contact_information;
		$order->save();
		$cart = Cart::where('user_id', Auth::user()->id)->first();
		$product_carts = ProductCart::where('cart_id', $cart->id)->get();
		foreach ($product_carts as $product_cart) {
			$new_productOder = new ProductOrder();
			$new_productOder->product_id = $product_cart->product_id;
			$new_productOder->order_id = $order->id;
			$new_productOder->quantity = $product_cart->quantity;
			$new_productOder->unit_price = $product_cart->unit_price;
			$new_productOder->color_id = $product_cart->color_id;
			$new_productOder->total_price = $product_cart->total_price;
			$new_productOder->save();
			$product_cart->delete();
		}
		return redirect()->route('bill')->with('success', 'Đặt hàng thành công');
	}
}
