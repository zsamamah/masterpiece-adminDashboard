@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add New Problem</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin-problems') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3" >
                        <label for="">Problem Name</label>
                        <input type="text" class="form-control" name="problem" required>
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                        </select>
                        <hr>
                    </div>
                    <div class="col-mid-12 mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="5" required></textarea>
                        <hr>
                    </div>
                    <div class="col-mid-12 mb-3">
                        <label for="">Example</label>
                        <textarea class="form-control" name="example" rows="5" required></textarea>
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 1</label>
                        <input type="text" class="form-control" name="case_1" required>
                        <hr>
                        <label for="">Solution 1</label>
                        <input type="text" class="form-control" name="sol_1" required >
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 2</label>
                        <input type="text" class="form-control" name="case_2" required >
                        <hr>
                        <label for="">Solution 2</label>
                        <input type="text" class="form-control" name="sol_2" required >
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 3</label>
                        <input type="text" class="form-control" name="case_3" required >
                        <hr>
                        <label for="">Solution 3</label>
                        <input type="text" class="form-control" name="sol_3" required >
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 4</label>
                        <input type="text" class="form-control" name="case_4" required >
                        <hr>
                        <label for="">Solution 4</label>
                        <input type="text" class="form-control" name="sol_4" required >
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3" >
                        <label for="">Case 5</label>
                        <input type="text" class="form-control" name="case_5" required >
                        <hr>
                        <label for="">Solution 5</label>
                        <input type="text" class="form-control" name="sol_5" required >
                        <hr>
                    </div>
                    <div class="col-mid-12">
                        <button type="submit" class="btn btn-primary">Add Problem</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection