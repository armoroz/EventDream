@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Venue Details for {{ $venue->venuename }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('venues.custshow_fields')					
					<div class="col-sm-6" style="margin:10px">
						<a class="btn btn-default float-right" href="{{ route('venues.displaygrid') }}">Back</a>
						<button id="addItem" type="button" class="btn btn-default float-left addItem" value="{{$venue->id}}">Add To Cart</button>
						<a href="{!! route('venueratings.ratevenue', [$venue->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="glyphicon glyphicon-star" title="Rate"></i>
						</a>
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
