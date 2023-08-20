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
@section('editProduct')
<body>
  <h3>Update Products</h3>
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    @csrf
    <div class="row">
        <div class="col-12">
          <input type="hidden" name="product_id" class="form-control @error('product_id') is-invalid @enderror" placeholder="Please Enter Product Name..." value="{{$product->id}}" required autocomplete="name" autofocus/>
          <span class="text-gray-700">Name</span>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Please Enter Product Name..." value="{{$product->name}}" required autocomplete="name" autofocus/>
            @error('name')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-4">
        <span class="text-gray-700">Price</span>
        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Please Enter Price..." value="{{$product->price}}" required/>
        </div>
        <div class="col-4">
        <span class="text-gray-700">Quantity</span>
        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Please Enter Quantity..." value="{{$product->quantity}}" required/>
        </div>
        <div class="col-4">
        <span class="text-gray-700">Category</span>
          <select  name="category" class="form-control @error('category') is-invalid @enderror" aria-label="Default select example" required>
          @if(isset($category))
              @foreach($category as $i)
            
              <option value="{{$i->id}}">{{$i->name}}</option>
              @endforeach
              @endif
              
              @if(isset($categories))
              @foreach($categories as $row)
              <option class="form-control @error('category') is-invalid @enderror" value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
              @endif
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <span class="text-gray-700">Description</span>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}" placeholder="Please Enter Description..." value="{{$product->quantity}}" required />
        @error('description')
        <div class="text-error">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="row">
    <div class="col-3">
    <span class="text-gray-700">Avatar</span>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" placeholder="Please choose a picture to represent the product"/>
        @error('image')
        <div class="text-error">{{ $message }}</div>
        @enderror
        </div>
    <div class="col-2">
    <div class="card">
            <img src="../resources/{{ $product->image }}" alt="img">
    </div>
    </div>
    <div class="col-6">
    <span class="text-gray-700">Album Images</span>
    <div class="album-images">
        <a href="{{ route('admin.album',$product->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="40%" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
        </svg></a>
    </div>
  
    </div>
    </div>

        <div class="form-group" >
        <button type="submit" class="btn btn-primary">Update</button>
        </div>    

    </form>
     
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
@endsection
</html>