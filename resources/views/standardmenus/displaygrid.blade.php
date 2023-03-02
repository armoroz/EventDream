@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<div style="padding-top:7%" class="container-fluid"> 
    <nav class="navbar navbar-default navbar-fixed-top"> 
			<div class="navbar-header">
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
			<li><a href="{{route('standardmenus.displaygrid')}}" style="font-size: 12pt" >Standard Menus</a></li>
        <ul class="list-inline nav navbar-nav navbar-right">
            <li><button id="checkOut" onclick="window.location.href='{{route('events.checkout')}}'" type="button" class="btn btn-primary navbar-btn center-block">Check Out</button></li> 
            <li><button id="emptycart" type="button" class="btn btn-primary navbar-btn center-block">Empty Cart</button></li> 
            <li><span style="font-size:30px;margin-right:0px;" class="glyphicon glyphicon-shopping-cart navbar-btn"></span></li>
            <div class="navbar-text" id="shoppingcart" style="font-size:12pt;margin-left:0px;margin-right:0px;">{{$totalItems}}</div>
            <li><div class="navbar-text" style="font-size:13pt;margin-left:0px;">Item(s)</div></li> 
			@include('layouts.navAuth')
        <ul> 
    </nav> 
</div>

