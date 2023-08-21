<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="shortcut icon" type="image/gif" href="{{ asset('resources/img/logo.jpg') }}"/>
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


@extends('templates.template')
</head>

@section('detail')
<body>
<div class="container">
  @if(isset($data))
  <div class="row">

      @foreach($data as $row)
    <div class="col-md-6">
      <div class="informationDetailProduct">
        <h1>{{ $row->name }}</h1>
        <h5>Category: @foreach($row->category as $item) <span>{{ $item->name }}</span> @endforeach </h5>
        <h5>Description: <span>{{ $row->description }}</span></h5>
        <h5>Price: <span>{{ number_format($row->price) }} VNĐ</span> </h5>
      </div>
    </div>

    <div class="col-md-6">
      <div class="slide">
      @foreach($row->getImage as $i)
        @if($i->image==NULL)
        <img class="mySlides" src="{{ asset('resources/img/default.jpg')}}">
        @else
        <img class="mySlides" src="{{ asset('resources/img/'.$i->image) }}" alt="{{$row->name}}" >
        @endif
        @endforeach
        
          <div class="row">
            <div class="col-6"><div class="button-back"><button type="button" class="btn btn-outline-danger"  onclick="plusDivs(1)">Back Image</button></div></div>
            <div class="col-6"><div class="button-next"><button type="button" class="btn btn-outline-primary"  onclick="plusDivs(-1)">Next Image</button></div></div>
          </div>
          </div>
       
    </div>
      @endforeach
  </div>
@endif

  <div class="other-product">
    <span >OTHER PRODUCT</span>
    @if(isset($array))
    <div class="row">
    @foreach($array as $ar)
      <div class="col-4">
      <div class="view-overlay"> 
        <a class="product" href="{{route('detailProduct', $ar->id)}}" title="View {{$ar->name}}">
        @if($ar->image==NULL)
        <img class="image" src="{{ asset('resources/img/default.jpg')}}">
        @else
        <img class="image" src="{{ asset('resources/img/'.$i->image) }}" alt="{{$ar->name}}" >
        @endif
        <div class="list-product">
        <label class="product-name">{{$ar->name}} - <label><label class="price_format" >{{number_format($ar->price)}} VNĐ</label>
        </div>
      </a>
      </div>
      </div>
      @endforeach
    </div>
  @endif
  </div>
</div>
</body>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<!-- <script>
  AOS.init();
</script> -->
@endsection
</html>
