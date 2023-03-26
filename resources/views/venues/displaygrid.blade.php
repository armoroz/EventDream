@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<form action="{{ route('venues.filter') }}" method="POST">
  @csrf
<button onclick="filterVenues()">Filter</button>
<label for="minPrice">Min Price:</label>
<input type="number" id="minPrice" name="minPrice">

<label for="maxPrice">Max Price:</label>
<input type="number" id="maxPrice" name="maxPrice">
<div id="filteredProducts"></div>

@foreach($venues as $venue) 
    @if ($j==0) <div class='row'> @endif 
        <div class="col-sm-4">
            <div class="panel panel-primary"> 
				<div class="panel-heading">{{ $venue->venuename }} {{ $venue->city }}</div> 
				@foreach($venue->venueimages->take(1) as $venueimage)		
				<div class="panel-body"><img class="img-responsive center-block" height="80%" width="200px" src="data:image/jpeg;base64,{{$venueimage->imagefile}}">
				</div>@endforeach
				<div class="panel-footer" style="text-align:center">
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

<script>
function filterProducts() {
  const priceFilter = document.getElementById("price-filter").value;
  const productList = document.getElementById("product-list");
  const productItems = productList.getElementsByTagName("product-items");
  
  for (let i = 0; i < productItems.length; i++) {
    const productPrice = parseInt(productItems[i].getAttribute("data-price"));
    
    if (priceFilter === "all" || (priceFilter === "0-50" && productPrice <= 50) ||
        (priceFilter === "50-100" && productPrice > 50 && productPrice <= 100) ||
        (priceFilter === "150-200" && productPrice > 150 && productPrice <= 200))
        (priceFilter === "250-300" && productPrice > 250 && productPrice <= 300))	{
      productItems[i].style.display = "block";
    } else {
      productItems[i].style.display = "none";
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