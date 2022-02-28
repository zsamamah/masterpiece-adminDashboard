@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Trip</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin-problems') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3" >
                        <label for="">Problem Name</label>
                        <input type="text" class="form-control" name="problem">
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
                        <textarea class="form-control" name="description"  rows="5"></textarea>
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