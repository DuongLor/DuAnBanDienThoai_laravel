<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
	//
	public function index()
	{
		$id = Auth::user()->id;
		$addresses = Address::where('user_id', $id)->get();
		return view('client.address.index', compact('addresses'));
	}
	public function create()
	{
		return view('client.address.create');
	}
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'address' => 'required',
			'phone' => 'required',
		]);
		$addresses = new Address();
		$addresses->name = $request->name;
		$addresses->address = $request->address;
		$addresses->phone = $request->phone;
		$addresses->user_id = Auth::user()->id;
		$addresses->save();
		return redirect()->route('address')->with('success', 'Thêm địa chỉ thành công');
	}
	public function edit($id)
	{
		$address = Address::find($id);
		
		return view('client.address.edit', compact('address'));
	}
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
			'address' => 'required',
			'phone' => 'required',
		]);
		
		$address = Address::find($id);
		$address->name = $request->name;
		$address->address = $request->address;
		$address->phone = $request->phone;
		$address->save();
		return redirect()->route('address')->with('success', 'Cập nhật địa chỉ thành công');
	}
	public function destroy($id)
	{
		$address = Address::find($id);
		$address->delete();
		return redirect()->route('address')->with('success', 'Xóa địa chỉ thành công');
	}
}
