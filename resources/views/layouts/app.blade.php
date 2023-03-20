<!DOCTYPE html>
    <head> 
        <meta charset="UTF-8"> 
        <title>EventDream</title> 
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
        <!-- Bootstrap 3.3.7 --> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
		<script src="{{asset('js/app.js')}}"></script>
    </head> 
    <body>
        <nav class="navbar navbar-default navbar-static-top">		
			<div class="navbar-header">
				<a class="navbar-brand" href="{{route('homepage.index') }}"><img src="{{asset('img\logo.png')}}" alt="Logo" width="120" height="50"></a>
			</div>

			<ul class="nav navbar-nav navbar-right" style="margin-right:10px">
			<li><a href="{{route('homepage.index')}}" style="font-size: 12pt" >Home</a></li>
			<li><a href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
			<li><a href="{{route('venues.displaygrid')}}" style="font-size: 12pt" >Venues</a></li>
			<li><a href="{{route('standardmenus.displaygrid')}}" style="font-size: 12pt" >Menus</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 12pt">Options<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{route('events.index')}}" style="font-size: 12pt" >Events</a></li>
						<li><a href="{{route('bookings.index')}}" style="font-size: 12pt" >Bookings</a></li>
						<li><a href="{{route('aboutus.index')}}" style="font-size: 12pt" >About us</a></li>
						<li><a href="{{route('venues.showmap')}}" style="font-size: 12pt" >Map</a></li>
					</ul>
			</li>

			<li>
			@if(Request::url() == route('venues.displaygrid') || Request::url() == route('venues.searchquery'))
				<form style="margin-top: 8px; height:33.5px;" action="{{route('venues.searchquery')}}" method="POST">
					@csrf
					<input type="text" name="searchquery">
					<button style="background-color:lightskyblue" type="submit">Search</button>
				</form>
			</li>
			<li>
			@elseif(Request::url() == route('products.displaygrid') || Request::url() == route('products.searchquery'))
				<form style="margin-top: 8px; height:33.5px;" action="{{route('products.searchquery')}}" method="POST">
					@csrf
					<input type="text" name="searchquery">
					<button style="background-color:lightskyblue" type="submit">Search</button>
				</form>
			</li>
			<li>
			@elseif(Request::url() == route('standardmenus.displaygrid') || Request::url() == route('standardmenus.searchquery'))
				<form style="margin-top: 8px; height:33.5px;" action="{{route('standardmenus.searchquery')}}" method="POST">
					@csrf
					<input type="text" name="searchquery">
					<button style="background-color:lightskyblue" type="submit">Search</button>
				</form>
			@else
				<form style="margin-top: 8px; height:33.5px;" action="{{route('products.searchquery')}}" method="POST">
					@csrf
					<input type="text" name="searchquery">
					<button style="background-color:lightskyblue" type="submit">Search</button>
				</form>
			@endif
			</li>
			
			@if(Request::url() == route('products.displaygrid') || Request::url() == route('venues.displaygrid') || Request::url() == route('standardmenus.displaygrid') || isset($venue) && Request::url() == route('venues.custshow', [$venue->id]) || isset($product) && Request::url() == route('products.custshow', [$product->id]) || isset($standardmenu) && Request::url() == route('standardmenus.custshow', [$standardmenu->id]) || Request::url() == route('venues.searchquery') || Request::url() == route('products.searchquery') || Request::url() == route('standardmenus.searchquery'))
            <li><button id="checkOut" onclick="window.location.href='{{route('events.checkout')}}'" type="button" class="btn btn-primary navbar-btn center-block" style="margin-left:3px; margin-right:3px;">Check Out</button></li> 
            <li><button id="emptycart" type="button" class="btn btn-primary navbar-btn center-block">Empty Cart</button></li> 
            <li><span style="font-size:30px;margin-right:0px;" class="glyphicon glyphicon-shopping-cart navbar-btn"></span></li>
            <div class="navbar-text" id="shoppingcart" style="font-size:12pt;margin-left:0px;margin-right:0px;">{{$totalItems}}</div>
            <li><div class="navbar-text" style="font-size:13pt;margin-left:0px;">Item(s)</div></li>
            @endif
			@include('layouts.navAuth')
			</ul>
        </nav> 
        <div id="page-content-wrapper"> 
            <div class="container-fluid"> 
                <div class="row"> 
                    <div class="col-lg-2">@yield('side')</div> 
                    <div class="col-lg-8"> @yield('content') </div> 
                    <div class="col-lg-2"></div> 
                </div> 
            </div> 
         </div> 
    </body> 
</html>