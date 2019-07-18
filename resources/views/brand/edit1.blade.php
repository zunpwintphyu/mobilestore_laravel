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
    Edit Brand Model
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
      <form method="post" action="{{ route('brands.update', $brand->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Brand Name:</label>
              <!-- <input type="text" class="form-control" name="name" value="{{$brand->name}}"/> -->
              <select  class="form-control" name="name">
                        <option value="{{$brand->name}}">{{$brand->name}}</option>
                        <option value="Huawei"  name="name">Huawei</option>
                        <option value="Oppo" name="name">Oppo</option>
                        <option value="Vivo" name="name">Vivo</option>
                        <option value="Samsung"  name="name">Samsung</option>
                        <option value="Mi"  name="name">Mi</option>
                        <option value="Sony"  name="name">Sony</option>
                        <option value="Kenbo"  name="name">Kenbo</option>
                        <option value="Honor"  name="name">Honor</option>
                        <option value="Nokia"  name="name">Nokia</option>
                        <option value="Realmi"  name="name">Realmi</option>
                        <option value="Xiaomi"  name="name">Xiaomi</option>
                    </select>
          </div>
          <div class="form-group">
              <label for="price">Model:</label>
              <input type="text" class="form-control" name="model" value="{{$brand->model}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">URL:</label>
              <input type="text" class="form-control" name="url" value="{{$brand->url}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Brand Model</button>
      </form>
  </div>
</div>
@endsection
</div>
