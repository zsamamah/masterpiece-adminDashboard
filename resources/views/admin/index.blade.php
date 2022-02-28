@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Hello Admin !</h1>
        <a href="{{ url('users-dashboard') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Users Registerd</h4>
                    <p>{{$user->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('services-dashboard') }}">
            <div class="card">
                <div class="card-head">
                    <h4>Rooms</h4>
                    <p>{{$room->count()}}</p>
                </div>
            </div>
        </a>
        <hr>
        <br>
        <a href="{{ url('bookings') }}">
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