<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Auth_User_Controller extends Controller
{
    public function signUp(Request $request) {
        //	Thêm người dùng
        if($Sign = $request->input('Sign')){
            $request->validate([
                'FullName'=>'required',
                'UserName'=>'required',
                'PassWord' => 'required',
                'Re-PassWord' => 'required|same:PassWord',
                'Phone' => 'required ||numeric|| min:10',
                'Address' => 'required',
                'email' => 'required'
            ]);
            $customer = new Customer;
            $customer->FullName = $request->FullName;
            $customer->UserName = $request->UserName;
            $customer->PassWord = bcrypt($request->PassWord);
            $customer->Phone = $request->Phone;
            $customer->Address = $request->Address;
            $customer->email = $request->email;
            $customer->remember_token = $request->_token;
            $customer->save();
            $arr = [
                'username' => $request->UserName,
                'password' => $request->PassWord,
            ];
            if (Auth::attempt($arr)) {
                return redirect()->route('account');
            }
        }
	}

	//	Đăng nhập
	public function signIn(Request $request) {
        if($Login = $request->input('Login')){
            // $validate = Validator::make(
            //     $request->all(),
            //     [
            //         'Username' => 'required',
            //         'Password' => 'required',
            //     ],

            //     [
            //         'Username.required' => 'Tài Khoản không được để trống',
            //         'Password.required' => 'Mật Khẩu không được để trống'
            //     ]
            // );
            $request->validate([
                'Username'=>'required',
                'Password' => 'required'
            ]);
            $arr = [
                'username' => $request->Username,
                'password' => $request->Password,
            ];
            if (Auth::attempt($arr)) {
                return redirect()->route('account');
            } else {
                return view('website.logiN',['error'=>'Tài Khoản hoặc Mật Khẩu không đúng !!!!!']);
                //return redirect('login')->with('error','Tài Khoản hoặc Mật Khẩu không đúng !!!!!')->withErrors($validate);
            }
        }
	}

	// Đăng xuất
	public function SignOut() {
		Auth::logout();
		return redirect()->route('home');
	}
}
