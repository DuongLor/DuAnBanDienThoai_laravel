<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    //
		public function index()
		{
			$oder = Order::where('user_id', Auth::user()->id)->latest()->first();
			$product_orders = ProductOrder::where('order_id', $oder->id)->get();
			return view('client.bill.thankyou', compact('product_orders', 'oder'));
		}
		public function list(){
			return view('client.bill.list');
		}
}
