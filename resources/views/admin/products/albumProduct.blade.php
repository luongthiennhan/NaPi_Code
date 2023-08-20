<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="shortcut icon" type="image/gif" href="{{ asset('resources/img/logo.jpg') }}"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<title>Tiệm Trà Bee</title>
@extends('layouts.app')
</head>
@section('album-product')
<body>

<div class="container">
    <h3 class="title-album">Product Photo Album</h3>
    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div> 
    @endif
    <hr class="ruler-album">
    <div class="row">
        <div class="col-12">
        <form action="{{ route('images.new') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @if(isset($idProduct))
            <input type="hidden" name="id-product" value="{{$idProduct}}">
        @endif
        <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" value="{{old('images[]')}}" required placeholder="Please choose the product's photo" multiple/>
        @error('images')
        <div class="text-error">{{ $message }}</div>
        @enderror
        <div class="button-upload"> <button class="btn btn-success" type="submit" id="uploadButton">
        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images </button></div>
       
        </form>
        </div>
    </div>
       
    @if(isset($images))
    <div class="row">
    @foreach($images as $i)
    <div class="col-4">

    <div class="card">
    <div class="card-body">
    @if(isset($products))
    @foreach($products as $row)
        
    @if($row->image == $i -> image)
    <b>Avata</b>
    @else 
    <a class="card-link float-left text-danger" href="{{ route('remoteImage',[$i->id, $i->product_id]) }}"><i class="fa fa-fw fa-lg fa-trash"></i></a>
    @endif
    @endforeach
    @endif
    <img src="{{ asset('resources/'.$i->image) }}" id="brandLogo" class="img-fluid" alt="img">
    </div>
    </div>
    </div>
    @endforeach
    </div>
    @endif
</div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
@endsection
</html>