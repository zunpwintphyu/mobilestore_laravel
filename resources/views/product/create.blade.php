@extends('layouts.app')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<div class="card uper">
  <div class="card-header">
    Add List
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('lists.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Brand_Name:</label>
              <!-- <input type="text" class="form-control" name="name"/> -->
                    <select  class="form-control" name="name">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                          <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>

          </div>
          <div class="form-group">
              <label for="price">Model:</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="quantity"> Price :</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="quantity"> Quantity :</label>
              <input type="text" class="form-control" name="quantity"/>
          </div>
          <button type="submit" class="btn btn-primary">Create List</button>
      </form>
  </div>
</div>
@endsection
</div>
