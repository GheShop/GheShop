<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
        return view('admin.user.info',['user'=>Auth::user()->id]);
    }
}