<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAdminController extends Controller
{
	//
	public function index()
	{
		$Users = User::where('role', '1')->get();
		return view('admin.User.index', compact('Users'));
	}
	public function destroy($id)
	{
		$User = User::findOrFail($id);
		$User->delete();
		return redirect()->route('adminUser')->with('success', 'User đã được xóa');
	}
}
