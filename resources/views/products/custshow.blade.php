@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

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
