@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Problem</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin-problems.update',$problem['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Problem Name</label>
                        <input type="text" class="form-control" name="problem" value="{{$problem['problem']}}">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            @foreach ($types as $type)
                            <option value="{{$type}}" @if ($problem->type==$type)
                                @selected(true)
                            @endif >{{$type}}</option>
                            @endforeach
                            {{-- <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option> --}}
                        </select>
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Description</label>
                       <textarea name="description" class="form-control w-100" cols="20" rows="3" >{{$problem->description}}</textarea>
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Example</label>
                       <textarea name="example" class="form-control w-100" cols="20" rows="3" >{{$problem->example}}</textarea>
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 1</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['case_1']}}">
                        <hr>
                        <label for="">Solution 1</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['sol_1']}}">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 2</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['case_2']}}">
                        <hr>
                        <label for="">Solution 2</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['sol_2']}}">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 3</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['case_3']}}">
                        <hr>
                        <label for="">Solution 3</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['sol_3']}}">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 4</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['case_4']}}">
                        <hr>
                        <label for="">Solution 4</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['sol_4']}}">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 5</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['case_5']}}">
                        <hr>
                        <label for="">Solution 5</label>
                        <input type="text" class="form-control" name="problem" value="{{$tests['sol_5']}}">
                        <hr>
                    </div>
                    <div class="col-mid-12">
                        <button type="submit" class="btn btn-primary">Edit Problem</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
