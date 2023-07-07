<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
		public function index(){
			return view('client.login');
		}
		public function store(Request $request){
			$request->validate([
				'email' => 'required|email',
				'password' => 'required'
			]);
			$credentials = $request->only('email', 'password');
			if (Auth::attempt($credentials)) {
				if(Auth::user()->token == null){
					return redirect()->route('home');
				} else {
					Auth::logout();
					return redirect()->back()->with('error', 'Vui lòng xác thực email trước khi đăng nhập');
				}
			} else {
				return redirect()->back()->with('error', 'Email hoặc Password không đúng');
			}
		}
		public function logout(){
			Auth::logout();
			return redirect()->route('login');
		}
}
