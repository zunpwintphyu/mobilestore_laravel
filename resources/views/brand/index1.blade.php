@extends('layouts.app')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

</style>
<div class="container">
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <a href="{{ route('brands.create')}}" class="btn btn-info "> Create</a>
  <?php
     $keyword = (isset($_GET['keyword']))?$_GET['keyword']:'';
  ?>

  <form style="float:right">
  <input type="text" placeholder="  search..." name="keyword" value="{{ old('keyword',$keyword)}}" >
  <a href="{{ route('brands.index')}}" ><button type="submit" class="btn btn-success">search</button></a>
  </form>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Brand Name</td>
          <td>Model</td>
          <td>Url</td>
          <td colspan="2"><center>Action</center></td>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td>{{$brand->model}}</td>
            <td>
                <a href="{{ $brand->url}}" target="_blank" rel="noopener noreferrer">
                {{$brand->url}}
                </a>
            </td>
            <td><a href="{{ route('brands.edit',$brand->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('brands.destroy', $brand->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $brands->links() }}
<div>
@endsection
</div>
