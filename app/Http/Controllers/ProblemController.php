<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Problem_user;
use App\Models\Test;
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
            'description'=>$request['description'],
            'example'=>$request['example']
        ]);
        $id = Problem::all()->last()->id;
        Test::create([
            'problem_id'=>$id,
            'case_1'=>$request['case_1'],
            'sol_1'=>$request['sol_1'],
            'case_2'=>$request['case_2'],
            'sol_2'=>$request['sol_2'],
            'case_3'=>$request['case_3'],
            'sol_3'=>$request['sol_3'],
            'case_4'=>$request['case_4'],
            'sol_4'=>$request['sol_4'],
            'case_5'=>$request['case_5'],
            'sol_5'=>$request['sol_5']
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
        $problems_id = Problem_user::where('user_id',$user_id)->get();
        $arr=[];
        foreach($problems_id as $obj){
            array_push($arr,$obj['problem_id']);
        }
        $proplems = Problem::whereNotIn('id',$arr)->get();
        return response($proplems,202);
    }

    public function user_solved($user_id)
    {
        $problems_id = Problem_user::where('user_id',$user_id)->get();
        $arr=[];
        foreach($problems_id as $obj){
            array_push($arr,$obj['problem_id']);
        }
        $proplems = Problem::whereIn('id',$arr)->get();
        return response($proplems,202);
    }

    public function count_solved($user_id)
    {
        $user = User::where('id',$user_id)->first();
        $count = Problem_user::where('user_id',$user_id)->select('id')->get();
        return count($count);
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
        $tests = Test::where('problem_id',$id)->first();
        $types=['Easy','Medium','Hard'];
        return view('admin.problems.edit',compact('problem','tests','types'));
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
            'description'=>$request['description'],
            'example'=>$request['example']
        ]);
        $tests = Test::where('problem_id',$id)->first();
        $tests->update([
            'case_1'=>$request['case_1'],
            'sol_1'=>$request['sol_1'],
            'case_2'=>$request['case_2'],
            'sol_2'=>$request['sol_2'],
            'case_3'=>$request['case_3'],
            'sol_3'=>$request['sol_3'],
            'case_4'=>$request['case_4'],
            'sol_4'=>$request['sol_4'],
            'case_5'=>$request['case_5'],
            'sol_5'=>$request['sol_5']
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
