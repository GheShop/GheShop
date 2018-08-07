<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public static function send($mailto,$type,$data)
    {
        Mail::send(new SendMail($mailto,$type,$data));
    }
}
