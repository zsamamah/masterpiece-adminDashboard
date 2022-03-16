<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Problem_user;
use App\Models\User;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = Problem::all();
        return view('admin.problems.index',compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.problems.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Problem::create([
            'problem'=>$request['problem'],
            'type'=>$request['type'],
            'description'=>$request['description']
        ]);
        return redirect('admin-problems');
    }

    public function one_problem($id)
    {
        $problem = Problem::where('id',$id)->first();
        return response($problem,200);
    }

    public function user_problems($user_id)
    {
        $problems = Problem_user::where('user_id',$user_id)->select('problem_id')->get();
        $arr=[];
        foreach($problems as $obj){
            array_push($arr,$obj['problem_id']);
        }
        return response($arr,202);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problem = Problem::find($id);
        $types=['Easy','Medium','Hard'];
        return view('admin.problems.edit',compact('problem','types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem $problem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $problem = Problem::find($id);
        $problem->update([
            'problem'=>$request['problem'],
            'type'=>$request['type'],
            'description'=>$request['description']
        ]);
        return redirect('admin-problems');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $problem = Problem::find($id);
        $problem->deleteOrFail();
        return redirect('admin-problems');
    }

    public function get_problems()
    {
        $problems = Problem::all();
        return $problems;
    }
}