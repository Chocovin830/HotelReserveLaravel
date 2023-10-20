@extends ('layouts.master')
@section('content')
<form>
  <div class="mb-3">
  <select id="selecthotel" class="form-select">
        <option>hotelA</option>
        <option>hotelB</option>
        <option>hotelC</option>
    </select>
  <div class="mb-3">
    <label for="room-type" class="form-label">Password</label>
    <input type="text" class="form-control"  name="room-type" placeholder="room-type">
  </div>
  <div class="mb-3">
    <label for="service" class="form-label">service</label>
    <input type="text" class="form-control"  name="service" placeholder="service">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">price</label>
    <input type="text" class="form-control"  name="price" placeholder="price">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection