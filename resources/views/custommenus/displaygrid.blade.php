@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6" style="padding-bottom: 60px;">
				<h1>Custom Menus</h1>
			</div>
		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<div class='d-flex flex-wrap align-content-start' style="margin:-100px"> 
@foreach($custommenus as $custommenu) 
  <div class="p-0 col-4 g-3">
	<div class= "bodyoptions-ctm">
	  <div class= "container-ctm">
		<div class="card-ctm">
			<div class="content-ctm" style="margin:-10px">
			<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $custommenu->custommenuname }}</h5></div>	
			<div class="card-footer"><a href="{!! route('custommenus.assignmenuitems', [$custommenu->id]) !!}" 
			     class="btn btn-success mx-auto d-block updateDishes" title="Update Dishes">Update Dishes <i class='far fa-hat-chef'></i></a></div>	
		    <div class="card-footer"><button id="addItem" type="button" class="btn btn-success mx-auto d-block addItem" value="{{$custommenu->id}}"><i class='far fa-shopping-cart'></i></button></div>	
            <div class="card-footer"><a  href="{{ route('custommenus.custshow', [$custommenu->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">More info <i class="fas fa-info-circle"></i></button></a></div>				 
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
    type: "get", url: "{{ url('custommenus/all/emptycart')   }}",
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