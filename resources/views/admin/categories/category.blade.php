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
@section('category')
<body>

<div class="container">
@if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div> 
@endif

<a href="{{ url('admin/categories/new') }}"><button type="button" class="btn btn-primary">Add Category</button></a>


  @if(isset($categories))
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col">Description</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th colspan="2">Other</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $row)
    <tr>
      <th>{{ $row->id}}</th>
      <td>{{ $row->name }}</td>
      <td>{{ $row->slug }}</td>
      <td>{{ $row->description }}</td>
      <td>{{ $row->created_at }}</td>
      <td>{{ $row->updated_at }}</td>
      <td><a class="edit-product" href="{{ route('categories.edit',$row->id) }}"><i class='far fa-edit'></i></a></td>
      <td><a class="remote-product" href="{{ route('categories.remote',$row->id) }}"><i class='far'>&#xf2ed;</i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
@endsection
</html>