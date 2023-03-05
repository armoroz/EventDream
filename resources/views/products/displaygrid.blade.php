@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

@foreach($products as $product) 
    @if ($j==0) <div class='row'> @endif 
        <div class="col-sm-4">
            <div class="panel panel-primary"> 
            <div class="panel-heading">{{ $product->productname }} {{ $product->productdesc }} {{ $product->producttype }}</div> 
            <div class="panel-body"><img class="img-responsive center-block" height="100" width="100%" src="{{ $product->productimg }}"></div>
			<div class="panel-footer" style="text-align: center">€{{$product->productcost}}</div>
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
    @if ($j==3) @php $j=0 @endphp </div> @endif 
@endforeach



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