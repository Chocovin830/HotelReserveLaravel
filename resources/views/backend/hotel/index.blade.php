@extends('layouts.master')
@section('title','Hotel Page')
@section('hotelactive', 'nav-link active')
@section('content')

<div class="card">
  
  <div class="card-body">
    <div class="card-header">

      <h5 class="card-title">Hotels Table</h5>
      <a href="{{route('hotels.create')}}" class="btn btn-primary float-right">Create Hotel</a>
    </div>
    <table id="hoteltable" class="table table-striped table-bordered">

  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th>Image</th>
      <th scope="col">Location</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    
  </tbody>
</table>
  </div>
</div>




@endsection

@section('scripts')
<script>
  var table = $('#hoteltable').DataTable( {
    
    'processing': true,
    'serverSide': true,
    'ajax': {
      url:'/hotels/',
      error: function(xhr, textStatus, errorThrown){
        console.log("AJAX Error:", textStatus, errorThrown)
      }
    },
    "columns": [
      {
        "data":"id",
      },
      {
        "data": "name",
      },
      {
        "data" : "image",
      },
      {
        "data": "location",
      },
      {
        "data" : "action"
      }
    ]
});

$(document).on('click', '.delete', function(d){
  d.preventDefault();
  var id = $(this).data('id');
  Swal.fire({
  title: 'Are you sure you want to delete this?',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      url:'/hotels/' +id, 
      type:'DELETE',
      success:function(){
        table.ajax.reload();
      }
    });
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
})
  </script>
@endsection