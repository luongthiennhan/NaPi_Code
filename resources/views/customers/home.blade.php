<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="shortcut icon" type="image/gif" href="resources/img/logo.jpg"/>
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@extends('templates.template')
</head>

@section('home')
<body>
<div class="container">
<h1 class="title-product">Sản Phẩm Mới Nhất</h1>
<h1 class="title-maxim">Tự hào mang đến sản phẩm tốt nhất cho khách hàng</h1>
  @if(isset($data))
  <div class="row">
      @foreach($data as $row)
  <div class="col-4">
  <div class="view-overlay"> 
    <a class="product" href="{{route('detailProduct', $row->id)}}" title="View {{$row->name}}">
        @if($row->image==NULL)
        <img class="image" src="{{ asset('resources/img/default.jpg)}}">
        @else
        <img class="image" src="{{ asset('resources/img/'.$row->image) }}" alt="{{$row->name}}" >
        @endif
        <div class="list-product">
          <span class="product-name">{{$row->name}}<span>
          <hr class="product-ruler">
          <span class="price_format" >{{number_format($row->price)}} VNĐ</span>
        </div>
    </a>
    </div>
    </div>
    <!-- </div> -->
      @endforeach

</div>
@endif
</div>
</body>
<!-- <script>
  AOS.init();
</script> -->
@endsection
</html>
