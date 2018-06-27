<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{

    public function getLogin()
    {
        if(!Auth::check()){
            return view('admin.login');
        }
        return redirect()->route('admin.dashboard');

    }

    public function postLogin(Request $request)
    {
        $rules = [
            'username'=>'required',
            'password'=>"required|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/"
        ];
        $messages = [
            'username.required'=>'Tên đăng nhập không được để trống! ',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.regex' => "Mật khẩu phải có ít nhất 8 ký tự, ít nhất một ký tự thường, 1 ký tự số và một ký tự đặc biệt"
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $username = $request->input('username');
        $password = $request->input('password');
        $level = 1;
       // $remember = $request->input('rememberLogin');

        if(Auth::attempt(['name'=>$username,'password'=>$password,'level'=>$level])){
            return redirect()->route('admin.dashboard');
        }
        $errors = new MessageBag(["errorLogin" => "Email hoặc mật khẩu không đúng!"]);
        return redirect()->route('admin.get.login')->withErrors($errors);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.get.login');
    }
}
