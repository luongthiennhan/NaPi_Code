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
<style>
 
</style>
</head>
@section('createProduct')
<body>
  <h3>Create New Products</h3>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    @csrf
    <div class="row">
        <div class="col-12">
          <span class="text-gray-700">Name</span>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Please Enter Product Name..." value="{{old('name')}}" required autocomplete="name" autofocus/>
            @error('name')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-4">
        <span class="text-gray-700">Price</span>
        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Please Enter Price..." value="{{old('price')}}" required/>
        </div>
        <div class="col-4">
        <span class="text-gray-700">Quantity</span>
        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Please Enter Quantity..." value="{{old('quantity')}}" required/>
        </div>
        <div class="col-4">
        <span class="text-gray-700">Category</span>
          <select  name="category" class="form-control @error('category') is-invalid @enderror" aria-label="Default select example" required>
              <option value="">--Select Category--</option>
              @if(isset($data))
              @foreach($data as $row)
              <option class="form-control @error('category') is-invalid @enderror" value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
              @endif
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <span class="text-gray-700">Description</span>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" placeholder="Please Enter Description..." value="{{old('quantity')}}" required />
        @error('description')
        <div class="text-error">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="row">
    <div class="col-6">
        <span class="text-gray-700">Avatar</span>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" required placeholder="Please choose a picture to represent the product"/>
        @error('image')
        <div class="text-error">{{ $message }}</div>
        @enderror
        </div>
        <div class="col-6">
        <span class="text-gray-700">Images</span>
        <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" value="{{old('images[]')}}" required placeholder="Please choose the product's photo" multiple/>
        @error('images')
        <div class="text-error">{{ $message }}</div>
        @enderror
        </div>
    </div>

        <div class="form-group" >
        <button type="submit" class="btn btn-primary">Create new</button>
        </div>    

    </form>
     
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
@endsection
</html>