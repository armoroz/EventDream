@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-center">
            <div class="col-sm-6 text-center" style="padding-bottom: 60px; padding-top: 20px;">
                <h1>Custom Menus</h1>
            </div>
        </div>
    </div>
</section>

@section('side2')
<div class="button-container" style="margin-right: 50px; margin-bottom: 50px;">
    <a href="{{ route('menuitems.displaygrid') }}" class="btn btn-primary1 fixed-button">Create Custom Menu <i class="far fa-utensil-fork" style='font-size: 1.2em; margin-left: 5px;'></i></a>
</div>
@endsection('side2')

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<div class='d-flex flex-wrap align-content-start' style="margin:-100px"> 
@if(Auth::check())
@foreach($custommenus as $custommenu)
@if($custommenu->customerid == Auth::user()->customer->id)
  <div class="p-0 col-3 g-3">
	<div class= "bodyoptions-ctm">
	  <div class= "container-ctm">
		<div class="card-ctm">
			<div class="content-ctm" style="margin: -10px">
			<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $custommenu->custommenuname }}</h5></div>
		    <div class="card-footer"><button id="addItem" type="button" class="btn btn-primary2 addItem" value="{{$custommenu->id}}"><i class='far fa-shopping-cart'></i></button></div>
            <div class="card-footer"><a  href="{{ route('custommenus.custshow', [$custommenu->id]) }}"><button id="custshow" type="button" class="btn btn-primary1 custshow">Details <i class="fas fa-info-circle"></i></button></a></div>				
			<div class="card-footer"><a href="{!! route('custommenus.assignmenuitems', [$custommenu->id]) !!}" 
			     class="btn btn-primary1" title="Update Dishes">Update Dishes<i class='far fa-hat-chef' style='font-size: 1.1em; margin-left: 5px;'></i></a></div>	
			</div> 
		</div>
	  </div> 
	</div>
  </div>
  @endif
    @endforeach
	@endif
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

<style>
footer {
  display: none;
}
</style>
@endsection('content')