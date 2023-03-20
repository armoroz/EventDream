@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
<h1> Welcome to EventDream</h1>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<style>
  h2 {
	margin-left:250px;
  }

  .col-lg-8 {
    width: 75%;
	float: right;
	margin-right: -10px;
  }
div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
  margin-left:200px;
}

div.scrollmenu div {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
  height:150px;
  width:150px;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>

<h2>Venues</h2>
<div class="scrollmenu">
@foreach($venues as $venue)
	@if ($j==0) @endif
            @foreach($venue->venueimages->take(1) as $venueimage)		
				<div><a href="{{ route('venues.custshow', [$venue->id]) }}"><img class="img-responsive center-block" src="data:image/jpeg;base64,{{$venueimage->imagefile}}"></a>
				</div>@endforeach
      @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp  @endif 
@endforeach
</div>

<h2>Products</h2>
<div class="scrollmenu">
@foreach($products as $product)
	@if ($j==0) @endif
            <div><img class="img-responsive center-block" src="{{ $product->productimg }}"></div>
      @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp  @endif 
@endforeach
</div>

<h2>Menus</h2>
<div class="scrollmenu">
@foreach($standardmenus as $standardmenu)
	@if ($j==0) @endif
            @foreach($standardmenu->standardmenuimages->take(1) as $standardmenuimage)		
			<div><img class="img-responsive center-block" src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}">
			</div>@endforeach
      @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp  @endif 
@endforeach
</div>


@endsection('content')