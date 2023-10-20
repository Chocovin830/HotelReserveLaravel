@extends ('layouts.master')
@section('title','Create Hotel')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-header">
    <h5 class="card-title">Create Hotel</h5>
    </div>
<form action="{{route('hotels.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="Name" class="form-label">Name</label>
      <input type="text" id="Name" class="form-control" name="name" placeholder="Name">
    </div>
  <div class="mb-3">
    <label for="location" class="form-label">Password</label>
    <input type="text" class="form-control"  name="location" placeholder="location">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/hotels" class="btn btn-warning">Back</a>
</form>
</div>
</div>
@endsection