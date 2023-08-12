<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="{{ asset('resources/css/app.css') }}" rel="stylesheet" type="text/css" >
<title>Tiệm Trà Bee</title>
</head>
<header>
<nav class="header-nav">
    <ul>
      <li>
        <a href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a href="{{ url('/product') }}">PRODUCTS</a>
      </li>
      <li>
        <a href="{{ url('/contact') }}">CONTACT</a>
      </li>
    </ul>
  </div>
</nav>
<hr class="ruler">
<div class="branding">
<a href="{{url('/')}}" title="Home">
  <img class="store-logo" srcset="{{ asset('resources/img/logo.jpg') }}">
</a>
</div>
</header>
</body>
</html>