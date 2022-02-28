@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h1>Services Page</h1>
        <a href="admin-rooms/create" class="btn btn-primary">Add New Room!</a>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($room as $item)
                <tr class="border">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('edit-room',$item->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" style="display: inline;" action="{{route('delete-room',$item->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" style="display: inline;" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center">
            {{$services->links()}}
        </div>  --}}
    </div>
</div>
@endsection
