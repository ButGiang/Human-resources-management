<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\messagesHelper;
use App\Models\users;

class authController extends Controller
{
    public function login() {
        return view('auth.login', [
            'title' => 'Đăng nhập'
        ]);
    }

    public function post_login(Request $request) {
        // kiểm tra thông tin input
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        // kiểm tra độ chính xác của tài khoản 
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) 
        { 
            // nếu đúng thông tin thì chuyển sang trang admin
            return redirect()->route('dashboard');
        }
        // nếu sai thông tin thì hiện thông báo & trở lại
        Session::flash('error', messagesHelper::$LOGIN_FAIL);
        return redirect()->back()->withInput();
    }


    public function register() {
        return view('auth.register', [
            'title' => 'Đăng kí tài khoản'
        ]);
    }

    public function post_register(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:15|same:confirm-password',
        ]);

        $user = users::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        if($user) {
            Session::flash('success', messagesHelper::$REGISTER_SUCCESS);
            return redirect()->back();
        }
        else {
            Session::flash('error', messagesHelper::$REGISTER_FAIL);
            return redirect()->back()->withInput();
        }
    }
}
