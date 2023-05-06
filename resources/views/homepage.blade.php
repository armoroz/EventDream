@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
<h1 style="text-align: center; margin-top: 20px; font-family: Garamond, serif;">Welcome to EventDream</h1>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<style>
h2 {
	margin-left:0px;
	padding-top: 30px;
	font-family: Garamond, serif;
  }

.col-lg-8 {

	float: right;
	min-width: 1300px;
  }

.col-lg-2 {
	max-width: 100px;
  }

.img-home {
	min-width: 200px;  
	min-height: 150px;
	max-width: 200px;  
	max-height: 150px;
}

div.scrollmenu {
  background-color: none;
  overflow: auto;
  white-space: nowrap;
  margin: -15px;
  height: 545px;
}

div.scrollmenu div.home {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 0px;
  text-decoration: none;
  height:30px;
  width:260px;
}

div.scrollmenu a:hover {
  background-color: #777;
}

.card-header {
	color: grey;
}

.container-stdm .card-stdm {
	box-shadow: none;
	transition: 0.4s ease-in-out;
	position: relative;
	margin: 30px 10px;
	padding: 20px 15px;
	background: #fff;
	display: flex;
	flex-direction: column;
	min-width: 300px;
	height: 600px;
}

</style>

<h2 style="text-align: center; font-size: 20pt; margin: -25px;">Book a Venue or Browse Products</h2>
<h2 style="text-align: center;">Venues</h2>
<div class="scrollmenu">
@foreach($venues as $venue)
          <div class="home" style="margin-right: 53px;">
			<div class= "container-stdm">
				<div class="card-stdm" style="height: 100%; margin-bottom: -20px;">
					<div class="box-image-stdm">
						<div class="image-wrapper">
					    @foreach($venue->venueimages->take(1) as $venueimage)<img src="data:image/jpeg;base64,{{$venueimage->imagefile}}"/>@endforeach
						</div>
					</div>
					<div class="content-stdm">
						<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $venue->venuename }}</h5></div>
						<div class="card-footer" style="text-align: center; color: black;">€{{$venue->costtorent}}</div>
						<div class="card-footer"><button id="vendisplay" type="button" class="btn btn-primary1 center-block vendisplay" onclick="handleCheckLogin('{{ url('calendar/vendisplay', [$venue->id]) }}')">Book Venue <i class="far fa-calendar-alt"></i></button></div>
						<div class="card-footer"><a href="{{ route('venueratings.showvenueratings', [$venue->id] )}}">
							<input id="fieldRating" name="rating" 
							value="{!! round($venue->venueratings->avg('rating'),2); !!}" 
							type="hidden" data-theme="krajee-fas" class="rating rating-loading" data-min=0 
							data-max=5 data-step=1 data-size="sm" data-display-only="true"></a>
						</div>
					</div>
				</div>
			</div>
			</div>	
@endforeach
<div class="home"><a style="text-decoration: none; color: lightgrey;" href="{!! route('venues.displaygrid') !!}"><span style="font-size:60px;margin-left:30px; margin-bottom:10px;">View All <i class="fas fa-angle-right"></i></span></a></div>
</div>

<h2 style="text-align: center;">Products</h2>
<div class="scrollmenu">
@foreach($products as $product)
	<div class="home" style="margin-right: 53px;">
		<div class= "container-stdm">
			<div class="card-stdm" style="height: 100%; margin-bottom: -20px;">
				<div class="box-image-stdm">
					<div class="image-wrapper">
						<img src="{{ $product->productimg }}"/>
					</div>
				</div>
				
				<div class="content-stdm"> 
					<div class="card-header d-block">{{ $product->productname }} {{ $product->productdesc }} {{ $product->producttype }}</div> 
					<div class="card-footer" style="text-align: center; color:black;">€{{$product->productcost}}</div>			
					<div class="card-footer">
						<a href="{{ route('products.custshow', [$product->id]) }}" id="custshow" class="btn btn-primary1">
							Details <i class="fas fa-info-circle"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
<div class="home"><a style="text-decoration: none; color: lightgrey;" href="{!! route('products.displaygrid') !!}"><span style="font-size:60px;margin-left:30px; margin-bottom:10px;">View All <i class="fas fa-angle-right"></i></span></a></div>
</div>

<h2 style="text-align: center;">Menus</h2>
<div class="scrollmenu">
@foreach($standardmenus as $standardmenu)
	<div class="home" style="margin-right: 53px;">
        <div class= "container-stdm">
			<div class="card-stdm" style="height: 100%; margin-bottom: -20px;">
				<div class="box-image-stdm">
					<div class="image-wrapper">
						@foreach($standardmenu->standardmenuimages->take(1) as $standardmenuimage)<img src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}"/>@endforeach
					</div>
				</div>
				
				<div class="content-stdm"> 
					<div class="card-header d-block">{{ $standardmenu->standardmenuname }}</div> 
					<div class="card-footer" style="text-align: center; color:black;">€20 Per Person</div>
					<div class="card-footer">
						<a href="{{ route('standardmenus.custshow', [$standardmenu->id]) }}" id="custshow" class="btn btn-primary1">
							Details <i class="fas fa-info-circle"></i>
						</a>
					</div>
					<div class="card-footer"><input id="fieldRating" name="rating" 
					value="{!! round($standardmenu->standardmenuratings->avg('rating'),2); !!}" 
					type="hidden" data-theme="krajee-fas" class="rating rating-loading" data-min=0 
					data-max=5 data-step=1 data-size="sm" data-display-only="true"></div>
				</div>
			</div>			
        </div>
	</div>
@endforeach
<div class="home"><a style="text-decoration: none; color: lightgrey;" href="{!! route('standardmenus.displaygrid') !!}"><span style="font-size:60px;margin-left:30px; margin-bottom:10px;">View All <i class="fas fa-angle-right"></i></span></a></div>
</div>
@endsection('content')