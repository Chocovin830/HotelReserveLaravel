@extends ('layouts.master')


@section('title','Edit Hotel')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="card-header">
        <h5 class="card-title">Edit Hotel</h5>
        </div>
        <form action="{{route('hotels.update', $hotel->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" id="Name" class="form-control" value="{{old('name', $hotel->name)}}" name="name" placeholder="Name">
            </div>
            <div class="mb-3">
            <label for="location" class="form-label">location</label>
            <input type="text" class="form-control" value="{{old('name', $hotel->location)}}" name="location" placeholder="location">
            </div>
            <div class="mb-3">
            <label for="image" class="form-label">Image</label> <br/>
            <img src="{{url('/images/'.$hotel->image)}}" width="150" height="100">
            <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/hotels" class="btn btn-warning">Back</a>
        </form>

    </div>
</div>
@endsection