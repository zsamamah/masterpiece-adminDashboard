@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Hello Admin !</h1>
        <a href="{{ url('admin-users') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Users Registerd</h4>
                    <p>{{$user->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('admin-contacts') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Contacts</h4>
                    <p>{{$contacts->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('admin-problems') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Problems</h4>
                    <p>{{$problem->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>

        {{-- <a href="{{ url('done-bookings') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Done Bookings</h4>
                    <p>{{$done->count()}}</p>
                </div>
            </div>
        </a> --}}
    </div>
</div>
@endsection