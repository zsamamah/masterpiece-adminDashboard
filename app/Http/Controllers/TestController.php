<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Problem_user;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    public function one_test($id)
    {
        $test = Test::where('problem_id',$id)->first();
        if($test)
        return response($test,200);
        else
        return response('No test cases for this problem',202);
    }

    public function solved($user_id,$user_email,Problem $problem)
    {
        //validate user
        $user = User::where('id',$user_id)->first();
        if($user['email']!=$user_email)
        return response('Unauthorized',203);

        //validate that user never solve this problem before
        $data=Problem_user::where([
            ['user_id','=',$user_id],
            ['problem_id','=',$problem['id']]
        ])->first();

        if($data==null){
            Problem_user::create([
                'user_id'=>$user['id'],
                'problem_id'=>$problem['id']
            ]);
            //update solvers counter
            $problem->update([
            'solvers'=>$problem['solvers']+1
            ]);
        }
        else
            return response($data,202);


        return response('Excellent Work',200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
