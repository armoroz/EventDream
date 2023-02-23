@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
<div style="padding-top:7%" class="container-fluid"> 
    <nav class="navbar navbar-default navbar-fixed-top"> 
			<div class="navbar-header">
				<a class="navbar-brand" href="{{route('dashboard') }}"><img src="{{asset('img\logo.png')}}" alt="Logo" width="120" height="50"></a>
			</div>
            <ul class="nav navbar-nav"> 
			<li><a href="{{route('products.displaygrid')}}" style="font-size: 12pt" >Products</a></li>
			<li><a href="{{route('venues.index')}}" style="font-size: 12pt" >Venues</a></li>
			<li><a href="{{route('events.index')}}" style="font-size: 12pt" >Events</a></li>
			<li><a href="{{route('display.index')}}" style="font-size: 12pt" >Calendar</a></li>
			<li><a href="{{route('customers.index')}}" style="font-size: 12pt" >Customers</a></li>
			<li><a href="{{route('bookings.index')}}" style="font-size: 12pt" >Bookings</a></li>
			<li><a href="{{route('aboutus.index')}}" style="font-size: 12pt" >About us</a></li>
        <ul class="nav navbar-nav navbar-right" style="margin-right:10px">
            <li><button id="checkOut" onclick="window.location.href='{{route('events.checkout')}}'" type="button" class="btn btn-primary navbar-btn center-block" style="margin-right:5px">Check Out</button></li> 
            <li><button id="emptycart" type="button" class="btn btn-primary navbar-btn center-block">Empty Cart</button></li> 
            <li><span style="font-size:30px;margin:5px;" class="glyphicon glyphicon-shopping-cart navbar-btn"></span></li>
			<li><div class="navbar-text" id="shoppingcart" style="font-size:12pt;margin-left:0px;margin-right:0px;">{{$totalItems}}</div></li>
            <li><div class="navbar-text" style="font-size:13pt;margin-left:3px;">Item(s)</div></li> 
			@include('layouts.navAuth')
        <ul> 
    </nav> 
</div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Details for {{ $product->productname }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('products.custshow_fields')
					<div class="col-sm-6" style="margin:10px">
						<a class="btn btn-default float-right" href="{{ route('products.displaygrid') }}">Back</a>
						<button id="addItem" type="button" class="btn btn-default float-left addItem" value="{{$product->id}}">Add To Cart</button>
					</div>
                </div>
            </div>
        </div>
    </div>
	
<script>
$(".bth,.addItem").click(function() {
    var total = parseInt($('#shoppingcart').text());
    var i=$(this).val();
    $('#shoppingcart').text(total);    
    $.ajax({
      type: "get",
      url: "{{url('products/additem/')}}" + "/" + i,
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
    type: "get", url: "{{ url('products/emptycart')   }}",
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
