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
			<li><a href="{{route('calendar.display')}}" style="font-size: 12pt" >Calendar</a></li>
			<li><a href="{{route('customers.index')}}" style="font-size: 12pt" >Customers</a></li>
			<li><a href="{{route('bookings.index')}}" style="font-size: 12pt" >Bookings</a></li>
			<li><a href="{{route('aboutus.index')}}" style="font-size: 12pt" >About us</a></li>
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

@foreach($venues as $venue) 
    @if ($j==0) <div class='row'> @endif 
        <div class="col-sm-4">
            <div class="panel panel-primary"> 
            <div class="panel-heading">{{ $venue->venuename }} {{ $venue->city }}</div> 
            <div class="panel-body"><img class="img-responsive center-block" height="100" width="100%" src="{{ $venue->venueimg }}"></div>
			<div class="panel-footer" style="text-align: center">€{{$venue->costtorent}}</div>
            <div class="panel-footer"><button id="addItem" type="button" class="btn btn-default center-block addItem" value="{{$venue->id}}">Add To Cart</button></div>
            <div class="panel-footer" style="text-align:center">
			<button type="button" class="btn btn-default add"><span class="glyphicon glyphicon-plus" value="{{$venue->id}}"/></button> 
            <button type="button" class="btn btn-default subtract"><span class="glyphicon glyphicon-minus"/></button> 
            <button type="button" class="btn btn-default value="remove" onClick="$(this).closest('tr').remove();"><span class="glyphicon glyphicon-remove"/></button>
			<div class="panel-footer"><a  href="{{ route('venues.custshow', [$venue->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a></div>	
			</div>			
        </div>
    </div> 
    @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp </div> @endif 
@endforeach



<script>
$(".bth,.addItem").click(function() {
    var total = parseInt($('#shoppingcart').text());
    var i=$(this).val();
    $('#shoppingcart').text(total);    
    $.ajax({
      type: "get",
      url: "{{url('venues/additem/')}}" + "/" + i,
      type: "GET",
      success: function(response) {
          total=total+1;
          $('#shoppingcart').text(response.total);
      },
      error: function() {
          alert("problem communicating with the server");
      }
    });
});

$("#emptycart").click(function() { $.ajax({ 
    type: "get", url: "{{ url('venues/emptycart')   }}",
    success: function() { 
        $('#shoppingcart').text(0); 
    }, 
    error: function() { 
        alert("problem communicating with the server");
    } 
  }); 
}); 
</script>
@endsection('content')