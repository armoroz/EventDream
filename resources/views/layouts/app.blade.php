<!DOCTYPE html>
    <head> 
        <meta charset="UTF-8"> 
        <title>EventDream</title> 
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
        <!-- Bootstrap 3.3.7 --> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
  
    </head> 
    <body>
        <nav class="navbar navbar-default navbar-static-top">		
			<div class="navbar-header">
				<a class="navbar-brand" style="font-size: 16pt" href="{{route('events.index') }}">EventDream</a>
			</div>
            <ul class="nav navbar-nav"> 
			<li><a href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
			<li><a href="{{route('events.index')}}" style="font-size: 12pt" >Events</a></li>
			<li><a href="{{route('display.index')}}" style="font-size: 12pt" >Calendar</a></li>
			<li><a href="{{route('customers.index')}}" style="font-size: 12pt" >Customers</a></li>
			<li><a href="{{route('bookings.index')}}" style="font-size: 12pt" >Bookings</a></li>
			<ul class="nav navbar-nav navbar-right" style="margin-right:10px">
				@if(Auth::check())
					@if(Auth::user()->hasRole('System Admin'))
						 @include('layouts.adminmenu')
					@endif 
					<li><a href="{!! route('logout') !!}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				@else
					<li><a href="{!! route('login') !!}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<li><a href="{!! route('register') !!}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
				@endif
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