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
@section('createCategory')
<body>
  <h3>Create New Category</h3>
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
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
        <div class="col-6">
        <span class="text-gray-700">Slug</span>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Please Enter Slug..." name="slug" value="{{ ucwords(str_replace('-',' ',old('slug'))) }}" required>
        </div>
        <div class="col-6">
        <span class="text-gray-700">Description</span>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Please Enter Description..." value="{{old('description')}}" required/>
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