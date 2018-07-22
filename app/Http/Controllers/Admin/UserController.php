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
    public function index()
    {
        return __FUNCTION__;
    }
    public function show()
    {
        return __FUNCTION__;
    }
    public function create()
    {
        return __FUNCTION__;
    }
    public function store()
    {
        return __FUNCTION__;
    }
    public function edit()
    {
        return __FUNCTION__;
    }
    public function update()
    {
        return __FUNCTION__;
    }
    public function destroy()
    {
        return __FUNCTION__;
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }
}
