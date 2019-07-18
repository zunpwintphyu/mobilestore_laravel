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
    Add Brand Model
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
      <form method="post" action="{{ route('brands.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Brand Name:</label>
              <!-- <input type="text" class="form-control" name="name"/> -->
              <select  class="form-control" name="name">
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
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="quantity">URL:</label>
              <input type="text" class="form-control" name="url"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Brand Model</button>
      </form>
  </div>
</div>
@endsection
</div>
