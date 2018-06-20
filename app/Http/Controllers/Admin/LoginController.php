<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $condition = true;
        if($condition){
            $session_value = [
                'user' => 'admin',
                'password'=> 'root'
            ];
            $this->request->session()->put('admin', $session_value);
            return redirect()->route('dashboard');
        }
    }

    public function getLoginTest()
    {
        return view('login');
    }

    public function postLoginTest(Request $request)
    {
        $rules = [
            'email'=>'required|email',
            'password'=>"required|min:8"
        ];
        $messages = [
            'email.required'=>'Email la truong bat buoc',
            'email.email'=>'Email khong dung dinh dang',
            'password.required'=>'Mat khau la truong bat buoc',
            'password.min'=>'Mat khau phai chua it nhat 8 ky tu'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return intended('/');
        }
        return redirect()->back();
    }
}
