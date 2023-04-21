@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<form action="{{ route('venues.filtervenues') }}" method="POST" style="margin: 5px 0px 5px 0px;">
  @csrf
<i class="fas fa-spinner fa-spin"></i>
<button onclick="filterVenues()">Filter</button>
<label for="minPrice">Min Price:</label>
<input type="number" id="minPrice" name="minPrice">

<label for="maxPrice">Max Price:</label>
<input type="number" id="maxPrice" name="maxPrice">
<div id="filteredProducts"></div>
</form>

<div style="align: right; width: 110px; margin: 5px 0px 5px 0px;">

            <select id="venuelocationselect" class="form-select" size="1">
				<option value="All" selected>Filter By</option>
                <option value="All">All</option>
                <option value="Dublin">Dublin</option>
                <option value="Meath">Meath</option>
                <option value="Kildare">Kildare</option>
            </select>   
     
</div>

<div class='d-flex flex-wrap align-content-start bg-transparent'> 
@foreach($venues as $venue) 
    <div class="p-2 col-4 g-3 venuelocationnames {{$venue->city}}"> 
        <div class="card text-center"> 
			<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $venue->venuename }}</h5></div>
			@foreach($venue->venueimages->take(1) as $venueimage)<div class="card-body"><img style="max-height: 200px; min-height: 200px; max-width:250px; min-width: 250px;" class="mx-auto d-block" src="data:image/jpeg;base64,{{$venueimage->imagefile}}"/></div>@endforeach
			<div class="card-footer" style="text-align: center">€{{$venue->costtorent}}</div>
			<div class="card-footer" style="text-align: center"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> {{$venue->city}}</div>
			<div class="card-footer"><button id="addItem" type="button" class="btn btn-addtoCart addItem" value="{{$venue->id}}"><i class='far fa-shopping-cart'></i></button></div>
			<div class="card-footer"><a  href="{{ route('venues.custshow', [$venue->id]) }}"><button id="custshow" type="button" class="btn btn-moreInfo custshow">More info <i class="fas fa-info-circle"></i></button></a></div>
			<div class="card-footer"><button id="vendisplay" type="button" class="btn btn-default center-block vendisplay" onclick="handleViewAvailability('{{ url('calendar/vendisplay', [$venue->id]) }}')">View Availibility</button></div>
			<div class="card-footer"><a href="{{ route('venueratings.showvenueratings', [$venue->id] )}}">
				<input id="fieldRating" name="rating" 
				value="{!! round($venue->venueratings->avg('rating'),2); !!}" 
				type="text" data-theme="krajee-fas" class="rating rating-loading" data-min=0 
				data-max=5 data-step=1 data-size="sm" data-display-only="true"></a>
			</div>		
		</div> 
	</div>
@endforeach
</div>



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
    type: "get", url: "{{ url('venues/all/emptycart')   }}",
    success: function() { 
        $('#shoppingcart').text(0); 
    }, 
    error: function() { 
        alert("problem communicating with the server");
    } 
  }); 
}); 

$("#venuelocationselect").on('change', function() {
    var city = $(this).find(":selected").val();
    if (city=='All') {
        $('.venuelocationnames').show();
    }
    else {
        $('.venuelocationnames').hide();
        $('.'+city).show();
    } 
});

</script>
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
</script>

<script>
let isAuthenticated = @json(auth()->check());

function handleViewAvailability(url) {
  if (isAuthenticated) {
    window.location.href = url;
  } else {
    let result = confirm('You must login or sign up to view this page. Click OK to login or Cancel to stay on this page.');
    if (result) {
      window.location.href = '{{ url("login") }}';
    }
  }
}
</script>
@endsection('content')