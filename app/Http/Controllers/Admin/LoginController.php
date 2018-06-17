<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
