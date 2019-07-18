
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
    Edit List
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
      <form method="post" action="{{ route('lists.update', $list->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Brand_Name:</label>


              <select  class="form-control" name="name">
                        <option value="{{$list->name}}">{{$list->name}}</option>
                        @foreach($brands as $brand)
                          <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="price">Model :</label>
              <input type="text" class="form-control" name="model" value="{{$list->model}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Price :</label>
              <input type="text" class="form-control" name="price" value="{{$list->price}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Quantity :</label>
              <input type="text" class="form-control" name="quantity" value="{{$list->quantity}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update list</button>
      </form>
  </div>
</div>
@endsection
</div>
