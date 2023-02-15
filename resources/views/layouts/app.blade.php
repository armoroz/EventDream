<!DOCTYPE html>
    <head> 
        <meta charset="UTF-8"> 
        <title>EventDream</title> 
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
        <!-- Bootstrap 3.3.7 --> 
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
		<script src="{{asset('js/app.js')}}"></script>-->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
		
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
		<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	-->
		<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
		<script src="{{asset('js/app.js')}}"></script>
		
		
		<!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">-->
		
  
    </head> 
    <body>
        <nav class="navbar navbar-default navbar-static-top">		
			<div class="navbar-header">
				<a class="navbar-brand" style="font-size: 16pt" href="{{route('events.index') }}">EventDream</a>
			</div>
            <ul class="nav navbar-nav"> 
				<li><a href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
				<li><a href="{{route('venues.index')}}" style="font-size: 12pt" >Venues</a></li>
				<li><a href="{{route('venueratings.index')}}" style="font-size: 12pt" >Venue Ratings</a></li>
				<li><a href="{{route('events.index')}}" style="font-size: 12pt" >Events</a></li>
				<li><a href="{{route('display.index')}}" style="font-size: 12pt" >Calendar</a></li>
				<li><a href="{{route('customers.index')}}" style="font-size: 12pt" >Customers</a></li>
				<li><a href="{{route('bookings.index')}}" style="font-size: 12pt" >Bookings</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="margin-right:10px">
			@include('layouts.navAuth')
				<!--@if(Auth::check())
					@if(Auth::user()->hasRole('System Admin'))
						 @include('layouts.adminmenu')
					@elseif(Auth::user()->hasRole('Warehouse Worker'))
					@include('layouts.stockmenu')
					@endif
					@include('layouts.profilemenu')
					<li><a href="{!! route('logout') !!}"><span class="glyphicon glyphicon-log-out" style="font-size: 12pt"></span> Logout</a></li>
				@else
					<li><a href="{!! route('login') !!}"><span class="glyphicon glyphicon-log-in" style="font-size: 12pt"></span> Login</a></li>
					<li><a href="{!! route('register') !!}"><span class="glyphicon glyphicon-user" style="font-size: 12pt"></span> Register</a></li>
				@endif-->
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