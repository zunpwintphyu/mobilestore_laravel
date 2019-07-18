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

  <a href="{{ route('lists.create')}}" class="btn btn-info "> Create</a>
  <?php
     $keyword = (isset($_GET['keyword']))?$_GET['keyword']:'';
  ?>

  <form style="float:right">
  <input type="text" placeholder="  search..." name="keyword" value="{{ old('keyword',$keyword)}}" >
  <a href="{{ route('lists.index')}}" ><button type="submit" class="btn btn-success">search</button></a>
  </form>

  <table class="table table-light col-lg-12 col-sm-12">
    <thead>
        <tr>
        <th><center>ID</center></th>
            <th><center>Brand_Name</center></th>
            <th><center>Model</center></th>
            <th><center>Price</center></th>
            <th><center>Quantity</center></th>
            <th colspan="2"><center>Action</center></th>
        </tr>
    </thead>
    <tbody>
        @foreach($list as $lists)
        <tr>
            <td>{{$lists->id}}</td>
            <td>{{$lists->name}}</td>
            <td>{{$lists->model}}</td>
            <td>{{$lists->price}}</td>
            <td>{{$lists->quantity}}</td>
            <td><a href="{{ route('lists.edit',$lists->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('lists.destroy', $lists->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $list->links() }}
<div>
@endsection
</div>
