<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login(){
    	return view('auth.login');
    }
    public function loginCheck(Request $request){
    	$this->validate($request, [
    		'username'=> 'required|max:12',
    		'password' => 'required|max:12'
		]);

		$current = User::where('username', $request->input('username'))
		->where('password', $request->input('password'))
		->first();

		if($current==[]) return redirect("/login");

		return redirect('/staff');
    	
    }
}
