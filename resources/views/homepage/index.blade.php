@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
<h1> Welcome to EventDream</h1>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<style>
  h2 {
	margin-left:0px;
	padding-top: 20px;
  }

  .col-lg-8 {
    width: 75%;
	float: right;
  }

.img-responsive {
	max-width: 200px;  
	height: 150px;
}

div.scrollmenu {
  background-color: none;
  overflow: auto;
  white-space: nowrap;
  margin: -15px;
  height: 440px;
}

div.scrollmenu div.home {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 6px;
  text-decoration: none;
  height:30px;
  width:260px;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>

<h2>Venues</h2>
<div class="scrollmenu">
@foreach($venues as $venue)
	@if ($j==0) @endif
          <div class="home">	
				<div class="panel panel-primary"> 
				<div class="panel-heading">{{ $venue->venuename }} {{ $venue->city }}</div> 
				@foreach($venue->venueimages->take(1) as $venueimage)		
				<div class="panel-body"><img class="img-responsive center-block" src="data:image/jpeg;base64,{{$venueimage->imagefile}}">
				</div>@endforeach
				<div class="panel-footer" style="text-align:center; color:black;">
				€{{$venue->costtorent}}
				<button id="addItem" type="button" class="btn btn-default center-block addItem" value="{{$venue->id}}">Add To Cart</button>
				<a  href="{{ route('venues.custshow', [$venue->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a>
				<a  href="{{ url('calendar/vendisplay', [$venue->id]) }}"><button id="vendisplay" type="button" class="btn btn-default center-block vendisplay">View Availibility</button></a>
				<div><a href="{{ route('venueratings.showvenueratings', [$venue->id] )}}">
					<input id="fieldRating" name="rating" 
					value="{!! round($venue->venueratings->avg('rating'),2); !!}" 
					type="text" class="rating rating-loading" data-min=0 
					data-max=5 data-step=1 data-size="sm" data-display-only="true">
			     </a> </div>

				</div>
			</div>	
		</div>
      @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp  @endif 
@endforeach
</div>

<h2>Products</h2>
<div class="scrollmenu">
@foreach($products as $product)
	@if ($j==0) @endif
	<div class="home">
            <div class="panel panel-primary"> 
            <div class="panel-heading">{{ $product->productname }} {{ $product->productdesc }} {{ $product->producttype }}</div> 
            <div class="panel-body"><img class="img-responsive center-block"  src="{{ $product->productimg }}"></div>
			<div class="panel-footer" style="text-align: center; color:black;">€{{$product->productcost}}</div>
            <div class="panel-footer"><button id="addItem" type="button" class="btn btn-default center-block addItem" value="{{$product->id}}">Add To Cart</button></div>
            <div class="panel-footer" style="text-align:center">
			<button type="button" class="btn btn-default add"><span class="glyphicon glyphicon-plus" value="{{$product->id}}"/></button> 
            <button type="button" class="btn btn-default subtract"><span class="glyphicon glyphicon-minus"/></button> 
            <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="glyphicon glyphicon-remove"/></button>
			</div>			
			<div class="panel-footer"><a  href="{{ route('products.custshow', [$product->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a></div>	
        </div>
	</div>
      @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp  @endif 
@endforeach
</div>

<h2>Menus</h2>
<div class="scrollmenu">
@foreach($standardmenus as $standardmenu)
	@if ($j==0) @endif
	<div class="home">
            <div class="panel panel-primary"> 
            <div class="panel-heading">{{ $standardmenu->standardmenuname }} {{ $standardmenu->standardmenudesc }} {{ $standardmenu->standardmenutype }}</div> 
            @foreach($standardmenu->standardmenuimages->take(1) as $standardmenuimage)		
			<div class="panel-body"><img class="img-responsive center-block" src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}">
			</div>@endforeach
			<div class="panel-footer" style="text-align: center; color:black;">
			€{{$standardmenu->standardmenucost}}
            <div class="panel-footer"><button id="addItem" type="button" class="btn btn-default center-block addItem" value="{{$standardmenu->id}}">Add To Cart</button></div>
            <a  href="{{ route('standardmenus.custshow', [$standardmenu->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a>
            <div><a href="{{ route('standardmenuratings.showstandardmenuratings', [$standardmenu->id] )}}">
					<input id="fieldRating" name="rating" 
					value="{!! round($standardmenu->standardmenuratings->avg('rating'),2); !!}" 
					type="text" class="rating rating-loading" data-min=0 
					data-max=5 data-step=1 data-size="sm" data-display-only="true">
			     </a> </div>
			</div>			
        </div>
	</div>
      @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp  @endif 
@endforeach
</div>


@endsection('content')