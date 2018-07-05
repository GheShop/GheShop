<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        echo "Dashboard.<br/>";
        echo "<pre>";
        print_r($this->request->session()->get('admin'));
        echo "</pre>";
    }
}
