<?php

namespace App\Http\Controllers;

use App\Mail\Reset;
use App\Mail\SignUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function reset_password($email)
    {
        $user = User::where('email',$email)->first();
        if($user){
            $url = 'http://localhost:8000/change-password/'.$email;
            Mail::to($email)->send(new Reset($url));
            return response('Email Sent Successfully',200);
        }
        else{
            return response('Not Found',203);
        }
    }
}
