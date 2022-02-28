@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Add New Service</h4>
  </div>
  <div class="card-body">
    <form method="POST" action="{{route('create-room')}}">
      @csrf
      <div class="form-group">
        <label for="name">Room Name</label>
        <input type="text" id="name" class="btn ms-2 text-start border d-block" name="name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="capacity">Capacity</label>
        <input type="number" name="capacity" class="btn ms-2 text-start border d-block" id="capacity">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="btn ms-2 text-start border d-block" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection