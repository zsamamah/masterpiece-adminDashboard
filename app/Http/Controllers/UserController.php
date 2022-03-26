<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    public function create_user()
    {
        return view('admin.user.add');
    }
    public function changePassword($email)
    {
        $user = User::where('email',$email)->first();
        if($user){
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);
        $user->update([
            'password'=>Hash::make($password)
        ]);
        return response('Your Password is '.$password,200);
        }
        else 
        return response('Not Found',201);
    }
    public function changePassword2($email)
    {
        $user = User::where('email',$email)->first();
        if($user){
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);
        $user->update([
            'password'=>Hash::make($password)
        ]);
        return view('password',compact('password'));
        }
        else 
        return redirect('http://localhost:3000/register');
    }
    public function changePassword3($email,$id,Request $request)
    {
        $user = User::where('email',$email)->first();
        if($user->id==$id){
            if(Hash::check($request['password'],$user->password)){
                if($request['new_password']==$request['new_confirm']){
                    $user->update([
                        'password'=>Hash::make($request['new_password'])
                    ]);
                    return response('password changed',200);
                }
                else return response('New password dont match',201);
            }
            else return response('Wrong Password',202);
        }
        else return response('Invalid user',203);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request['password']===$request['rpassword']){
            User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>Hash::make($request['password'])
            ]);
        }
        return redirect('admin-users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->update([
            'name'=>$request['name'],
            'email'=>$request['email']
        ]);
        if($request['password']!==null){
            $user->update([
                'password'=>Hash::make($request['password'])
            ]);
        }
        return redirect('admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user['email']=='admin@admin.com')
            return redirect('admin-users');
        $user->deleteOrFail();
        return redirect('admin-users');
    }
}
