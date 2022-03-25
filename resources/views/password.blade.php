@extends('layouts.app')

@section('content')
<div class="card col-10 mx-auto">
    <div class="card-header">
      Password Generated
    </div>
    <div class="card-body">
      <h5 class="card-title">Here is Your Password</h5>
      <p class="card-text">{{$password}}</p>
      <a href="http://localhost:3000/login" class="btn btn-primary">Sign In</a>
    </div>
  </div>
@endsection