@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <!-- <div class="card-header">Dashboard</div> -->
                <div class="card-header" style="color:#0080ff"><h5><center> Linn IT Solution Co.,Ltd</center></h5></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <div class="row">
                <div class="card-columns">
                    <label><h6>Products</h6></label>
                    <div class="card bg-primary">
                        <div class="card-body text-center">
                        <p class="card-text">{{ $lists->count()}}</p>
                        </div>
                    </div>

                    <label><h6>Brands</h6></label>
                    <div class="card bg-success">
                        <div class="card-body text-center">
                        <p class="card-text">{{ $brands->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
