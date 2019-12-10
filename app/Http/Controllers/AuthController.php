<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        //kiểm tra trường remember có được chọn hay không
        if (Auth::guard('admin')->attempt($arr)) {
            return redirect()->route('index');
        } else {
            return view('admin.login',['error'=>'Tài Khoản hoặc Mật Khẩu không đúng !!!!!']);
        }
    }
    public function getLogout() {
        Auth::guard('admin')->logout();
        return redirect()->route('home');
     }
}
