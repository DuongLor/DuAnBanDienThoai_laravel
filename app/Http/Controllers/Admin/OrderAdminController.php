<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderAdminController extends Controller
{
	public function index()
	{
		$Orders = Order::where('created_at', '<=', now())->latest()->get();
		return view('admin.order.index', compact('Orders'));
	}
	public function edit($id)
	{
		$Order = Order::findOrFail($id);
		return view('admin.Order.edit', compact('Order'));
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'status' => 'required',
		]);
		$Order = Order::findOrFail($id);
		$Order->status = $request->status;
		$Order->save();
		return redirect()->route('adminOrder')->with('success', 'Order đã được cập nhật');
	}
}
