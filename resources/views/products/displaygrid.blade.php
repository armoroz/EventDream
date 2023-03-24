@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<form action="{{ route('products.filterproducts') }}" method="POST">
  @csrf
  <select name="price_range">
    <option value="5">5</option>
    <option value="10">10</option>
  </select>
  <button type="submit">Filter</button>
</form>

    <div class='d-flex flex-wrap align-content-start bg-light'> 
    @foreach($products as $product) 
        <div class="p-2 border col-4 g-3"> 
            <div class="card text-center"> 
                <div class="card-header d-block"><h5 class="mx-auto d-block">{{ $product->productname }} {{ $product->productdesc }} {{ $product->producttype }}</h5></div>
                <div class="card-body"><img style="width:65%;height:200px;" class="mx-auto d-block" src="{{ $product->productimg }}"/></div>
				<div class="card-footer" style="text-align: center">€{{$product->productcost}}</div>
                <div class="card-footer"><button id="addItem" type="button" class="btn btn-success mx-auto d-block addItem" value="{{$product->id}}">Add To Cart</button></div>
				<div class="card-footer"><a  href="{{ route('products.custshow', [$product->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a></div>
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
</script>
@endsection('content')