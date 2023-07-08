<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    //
		public function index(){
			$id = Auth::user()->id;
			$addresses = Address::where('user_id', $id)->get();
			return view('client.address.index', compact('addresses'));
		}
		public function create(){
			return view('client.address.create');
		}
}
