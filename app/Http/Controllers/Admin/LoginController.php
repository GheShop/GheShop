<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

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
            'username'=>'required',
            'password'=>"required|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/"
        ];
        $messages = [
            'username.required'=>'Tên đăng nhập không được để ',
            'username.unique'=>'Tên đăng nhập đã tồn tại  ',
            'password.required'=>'Mật khẩu không được để trống',
            'password.regex' => "Mật khẩu phải có ít nhất 8 ký tự, ít nhất một ký tự thường, 1 ký tự số và một ký tự đặc biệt"
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $username = $request->input('username');
        $password = $request->input('password');

        $remember = $request->input('rememberLogin');

        if(Auth::attempt(['name'=>$username,'password'=>$password],$remember)){
            return redirect()->intended('/dashboard');
        }
        $errors = new MessageBag(["errorLogin" => "Email hoặc mật khẩu không đúng!"]);
        return redirect()->back()->withInput()->withErrors($errors);
    }
}
