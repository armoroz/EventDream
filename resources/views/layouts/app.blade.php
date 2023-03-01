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
				<!--<a class="navbar-brand" style="font-size: 16pt" href="{{route('dashboard') }}">EventDream</a>-->
				<a class="navbar-brand" href="{{route('dashboard') }}"><img src="{{asset('img\logo.png')}}" alt="Logo" width="120" height="50"></a>
			</div>
            <ul class="nav navbar-nav"> 
				
				<li><a href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
				<li><a href="{{route('venues.displaygrid')}}" style="font-size: 12pt" >Venues</a></li>
				<li><a href="{{route('events.index')}}" style="font-size: 12pt" >Events</a></li>
				<li><a href="{{route('customers.index')}}" style="font-size: 12pt" >Customers</a></li>
				<li><a href="{{route('bookings.index')}}" style="font-size: 12pt" >Bookings</a></li>
				<li><a href="{{route('aboutus.index')}}" style="font-size: 12pt" >About us</a></li>
				<li><a href="{{route('venues.showmap')}}" style="font-size: 12pt" >Map</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="margin-right:10px">
			@include('layouts.navAuth')
			</ul>
        </nav> 
        <div id="page-content-wrapper"> 
            <div class="container-fluid"> 
                <div class="row"> 
                    <div class="col-lg-2"></div> 
                    <div class="col-lg-8"> @yield('content') </div> 
                    <div class="col-lg-2"></div> 
                </div> 
            </div> 
         </div> 
    </body> 
</html>