@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 



<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Custom Menus</h1>
			</div>
		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!doctype html>
<html>
<head>
	<meta name= "viewport" content= "width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
</head>

	<div class= "dpg-bodyoptions">@foreach($custommenus as $custommenu) 
	  <div class= "dpg-container">
		<div class="dpg-card">
			<div class="dpg-content">
			<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $custommenu->custommenuname }} {{ $custommenu->description }}</h5></div>
            <div class="card-footer"><button id="addItem" type="button" class="btn btn-success mx-auto d-block addItem" value="{{$custommenu->id}}">Add To Cart</button></div>		
			<div class="card-footer"><a  href="{{ route('custommenus.custshow', [$custommenu->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a></div>
			<div class="card-footer"><a href="{!! route('custommenus.assignmenuitems', [$custommenu->id]) !!}" 
			     class="btn btn-default center-block" title="Update Dishes">Update Dishes</a>
		    </div>	
			</div> 
		</div>
	  </div> 
    @endforeach
	</div> 
</html>

<script>
$(".bth,.addItem").click(function() {
    var total = parseInt($('#shoppingcart').text());
    var i=$(this).val();
    $('#shoppingcart').text(total);    
    $.ajax({
      type: "get",
      url: "{{url('custommenus/additem/')}}" + "/" + i,
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
    type: "get", url: "{{ url('custommenus/emptycart')   }}",
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