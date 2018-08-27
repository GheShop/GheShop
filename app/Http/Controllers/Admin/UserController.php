<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\User;

class UserController extends Controller
{
    //
    public function __construct()
    {
        if(!Auth::check()){
            return view('admin.login');
        }
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function getUserInfo()
    {
        return view('admin.user.info',['user'=>Auth::user()]);
    }

    public function getChangePassword () {
        return view('admin.user.changePassWord');
    }

    public function postChangePassword (Request $request) {
        $user = Auth::user();

        $rules = [
            'currentPassword' => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/",
            'newPassword' => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/",
            'confirmPassword' => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/"
        ];
        $messages = [
            'currentPassword.required' => 'Tên đăng nhập không được để trống! ',
            'newPassword.required' => 'Mật khẩu không được để trống!',
            'confirmPassword.required' => "Mật khẩu phải có ít nhất 8 ký tự, ít nhất một ký tự thường, 1 ký tự số và một ký tự đặc biệt"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;
        if(!Hash::check($currentPassword,$user->password)) {
            return redirect()->back()->withErrors(['equal'=>'mk nhap vao eo dung']);
        }
        if(!$confirmPassword === $newPassword) {
            return redirect()->back()->withErrors(['same'=>'confirm password k trung khop']);
        }
        $user->update(['password'=>Hash::make($newPassword)]);
        return view('admin.user.changePassword',['message'=>'success']);
    }
}