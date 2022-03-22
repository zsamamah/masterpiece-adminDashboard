<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Problem;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        $contacts = Contact::all();
        $problem = Problem::all();
        return view('admin.index',compact('user','contacts','problem'));
    }
}
