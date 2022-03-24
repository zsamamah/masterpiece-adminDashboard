@extends('layouts.admin')

@section('content')
@if ($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <h1>Problems Page</h1>
            <a href="admin-problems/create" class="btn btn-primary">Add New Problem!</a>
            <hr>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-bordered table-striped overflow-auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Problem Name</th>
                        <th>Solvers</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($problems as $item)
                    <tr class="border">
                        <td>{{ $item->id }}</td>
                        <td >{{ $item->problem }}</td>
                        <td >{{ $item->solvers }}</td>
                        <td >{{ $item->type }}</td>
                        <td >{{ $item->description }}</td>
                        <td>
                            {{-- <a href="{{ route('done-booking',$item->id) }}" class="btn btn-danger">Done</a> --}}
                            <a href="{{ url('admin-problems/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{route('admin-problems.destroy',$item['id'])}}" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
