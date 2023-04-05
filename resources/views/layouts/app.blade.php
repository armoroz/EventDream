<!DOCTYPE html>
    <head> 
        <meta charset="UTF-8"> 
        <title>EventDream</title> 
		<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-chrome-192x192.png') }}">
		<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('img/android-chrome-512x512.png') }}">
		<link rel="manifest" href="{{ asset('img/site.webmanifest') }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 

		<!--suppress JSUnresolvedLibraryURL -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/js/star-rating.min.js"></script>
		<script src="{{asset('themes/krajee-fas/theme.js')}}"></script>
		<link rel="stylesheet" href="{{asset('themes/krajee-fas/theme.css')}}">     
		
		<!-- Bootstrap 5.1.3 --> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('css/eventdream.css')}}">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
		<script src="{{asset('js/app.js')}}"></script>
    </head> 
	
    <body>
		<div class="site-wrapper d-flex flex-column min-vh-100">
			<nav class="navbar navbar-expand-sm navbar-dark" style="position: fixed; top: 0; width: 100%; height: 50px; z-index: 9999; background:rgba(255,255,255,.4); backdrop-filter: blur(8px);">		
				<div class="navbar-header">
					<a class="navbar-brand" href="{{route('homepage') }}"><img src="{{asset('img\logo.png')}}" alt="Logo" width="120" height="50"></a>
				</div>

				<ul class="navbar-nav ms-auto">
				<li class="nav-item"><a class="nav-link" href="{{route('homepage')}}" style="font-size: 12pt" >Home</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('venues.displaygrid')}}" style="font-size: 12pt" >Venues</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('menuoptions.index')}}" style="font-size: 12pt" >Menus</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('venues.showmap')}}" style="font-size: 12pt" >Map</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('aboutus.index')}}" style="font-size: 12pt" >About Us</a></li>

				<li class="nav-item">
				@if(Request::url() == route('venues.displaygrid') || Request::url() == route('venues.searchquery'))
					<form style="margin-top: 5px; height:33.5px;" action="{{route('venues.searchquery')}}" method="POST">
						@csrf
						<input type="text" name="searchquery">
						<button style="background-color:lightskyblue" type="submit">Search</button>
					</form>
				</li>
				<li class="nav-item">
				@elseif(Request::url() == route('products.displaygrid') || Request::url() == route('products.searchquery'))
					<form style="margin-top: 5px; height:33.5px;" action="{{route('products.searchquery')}}" method="POST">
						@csrf
						<input type="text" name="searchquery">
						<button style="background-color:lightskyblue" type="submit">Search</button>
					</form>
				</li>
				<li class="nav-item">
				@elseif(Request::url() == route('standardmenus.displaygrid') || Request::url() == route('standardmenus.searchquery'))
					<form style="margin-top: 5px; height:33.5px;" action="{{route('standardmenus.searchquery')}}" method="POST">
						@csrf
						<input type="text" name="searchquery">
						<button style="background-color:lightskyblue" type="submit">Search</button>
					</form>
				@else
					<form style="margin-top: 5px; height:33.5px;" action="{{route('products.searchquery')}}" method="POST">
						@csrf
						<input type="text" name="searchquery">
						<button style="background-color:lightskyblue" type="submit">Search</button>
					</form>
				@endif
				</li>
				
				@if(Request::url() == route('products.displaygrid') || Request::url() == route('venues.displaygrid') || Request::url() == route('standardmenus.displaygrid') || Request::url() == route('custommenus.displaygrid') || isset($venue) && Request::url() == route('venues.custshow', [$venue->id]) || isset($product) && Request::url() == route('products.custshow', [$product->id]) || isset($standardmenu) && Request::url() == route('standardmenus.custshow', [$standardmenu->id]) || Request::url() == route('venues.searchquery') || Request::url() == route('products.searchquery') || Request::url() == route('standardmenus.searchquery') || Request::url() == route('venues.filtervenues') || Request::url() == route('products.filterproducts') || isset($custommenu) && Request::url() == route('custommenus.custshow', [$custommenu->id]))
				<li class="nav-item"><button id="checkOut" onclick="window.location.href='{{route('events.checkout')}}'" type="button" class="btn btn-primary navbar-btn center-block" style="margin-left:3px; margin-right:3px;">Check Out</button></li> 
				<li class="nav-item"><button id="emptycart" type="button" class="btn btn-primary navbar-btn center-block">Empty Cart</button></li> 
				<li class="nav-item"><span style="font-size:30px;margin-right:0px;" class="glyphicon glyphicon-shopping-cart navbar-btn"></span></li>
				<div class="navbar-text" id="shoppingcart" style="font-size:12pt;margin-left:0px;margin-right:5px;">{{$totalItems}}</div>
				<li class="nav-item"><div class="navbar-text" style="font-size:12pt;margin-left:0px;">Item(s)</div></li>
				@endif
				@include('layouts.navAuth')
				</ul>
			</nav> 

			<div id="page-content-wrapper"> 
				<div class="container-fluid"> 
					<div class="row"> 
						<div class="col-lg-2">@yield('side')</div> 
						<div class="col-lg-8" style="padding-top: 60px;"> @yield('content') </div> 
						<div class="col-lg-2"></div> 
					</div> 
				</div> 
			 </div> 
			 
			<footer class="text-white text-center py-3 mt-auto">
				<p>Policy | Legal | About Us | Socials | © 2023 EventDream™</p>
			</footer>
			
		</div>	  
    </body>
</html>