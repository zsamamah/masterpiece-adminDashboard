@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit {{$room['name']}}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('store-room',$room->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input value="{{$room->name}}" id="name" type="text" name="name" class="btn ms-2 text-start border">
            </div>
            <div class="col-md-6 mb-3">
                <label for="capacity">Capacity</label>
                <input value="{{$room->capacity}}" id="capacity" type="text" name="capacity" class="btn ms-2 text-start border">
            </div>
            <div class="col-mid-12">
                <label for="description">Description</label>
                <textarea id="description" rows="3" name="description" class="btn ms-2 text-start border">{{$room['description']}}</textarea>
            </div>
            <div class="col-mid-12">
                <button type="submit" class="btn btn-primary">Edit Service</button>
            </div>
        </form>
    </div>
</div>
@endsection