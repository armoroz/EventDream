@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6" style="padding-bottom: 20px;">
			</div>
		</div>
	</div>
</section>

<div class="row mb-2" style="margin-left: -75px;">
	<div class="col-sm-6" style="width: 138px;">
		<select id="productnameselect" class="form-select" size="1" style="background-color: #2d3033; color: white; border-color: #2d3033;">
			<option value="All" selected>Category</option>
			<option value="All">All</option>
			<option value="Flower">Flower</option>
			<option value="Elegance">Elegance</option>
			<option value="Standard">Standard</option>
		</select>
	</div>

	<div class="col-sm-6">
		<form action="{{ route('products.filterproducts') }}" method="POST">
			@csrf
			<output id="minPriceOutput">0</output>
			<input class="slider" type="range" min="0" max="50" value="0" id="minPrice" name="minPrice" oninput="minPriceOutput.value = minPrice.value" style="width:90px;">
			
			
			<input class="slider" type="range" min="0" max="50" value="50" id="maxPrice" name="maxPrice" oninput="maxPriceOutput.value = maxPrice.value" style="width:90px;">
			<output id="maxPriceOutput">50</output>
			<button class="btn btn-primary" onclick="filterProducts()">Filter Price</button>
			<div id="filteredProducts"></div>
		</form>
	</div>
</div>

<div class='d-flex flex-wrap align-content-start bg-transparent' style="margin-right:-100px; margin-left:-100px;"> 
    @foreach($products as $product) 
	<div class="p-0 col-4 g-4 allproductnames {{$product->productname}}">
		<div class= "bodyoptions-stdm">
			<div class= "container-stdm">
				<div class="card-stdm" style="height: 100%;">
					<div class="box-image-stdm">
						<div class="image-wrapper"><img  class="mx-auto d-block" src="{{ $product->productimg }}"/></div>
					</div>
						<div class="content-stdm">
							<div class="card-header d-block"><h5 class="mx-auto d-block">{{$product->productname}}</h5></div>
							<div class="card-footer" style="text-align: center">€{{$product->productcost}}</div>
							<div class="card-footer"><button id="addItem" type="button" class="btn btn-addtoCart addItem" style="background-color: #de9bb9;" value="{{$product->id}}"><i class='far fa-shopping-cart'></i></button></div>
							<div class="card-footer"><a  href="{{ route('products.custshow', [$product->id]) }}"><button id="custshow" style="background-color: #444452;" type="button" class="btn btn-moreInfo custshow">More info <i class="fas fa-info-circle"></i></button></a></div>
						</div>
				</div>
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
    type: "get", url: "{{ url('products/all/emptycart')   }}",
    success: function() { 
        $('#shoppingcart').text(0); 
    }, 
    error: function() { 
        alert("problem communicating with the server");
    } 
  }); 
}); 

$("#productnameselect").on('change', function() {
    var productname = $(this).find(":selected").val();
    if (productname=='All') {
        $('.allproductnames').show();
    }
    else {
        $('.allproductnames').hide();
        $('.'+productname).show();
    } 
});
</script>

@endsection('content')