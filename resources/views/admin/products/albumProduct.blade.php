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
    @if(isset($idProduct))
    <h3 class="title-album"><a class="btn btn-secondary" href="{{ route('edit',$idProduct) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
  <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
  <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
</svg> Back</a> Product Photo Album</h3>
    @endif
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
    <a class="card-link float-left text-danger" href="{{ route('remoteImage',[$i->id, $i->product_id, $i->image]) }}"><i class="fa fa-fw fa-lg fa-trash"></i></a>
    @endif
    @endforeach
    @endif
    <img src="{{ asset('resources/img/'.$i->image) }}" id="brandLogo" class="img-fluid" alt="img">
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