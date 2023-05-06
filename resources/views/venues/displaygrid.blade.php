@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6" style="padding-bottom: 0px;">

			</div>
		</div>
	</div>
</section>


<div class="row mb-2" style="margin-left: -75px;">
<div style="width: 135px;">
	<select id="venuelocationselect" class="form-select" size="1">
		<option value="All" selected>Location</option>
		<option value="All">All</option>
		<option value="Dublin">Dublin</option>
		<option value="Meath">Meath</option>
		<option value="Kildare">Kildare</option>
	</select>
</div>
</div>

<div class='d-flex flex-wrap align-content-start bg-transparent' style="margin-right:-100px; margin-left:-100px; margin-top: -20px;">  
    @foreach($venues as $venue) 
	<div class="p-0 col-4 g-4 venuelocationnames {{$venue->city}}">
		<div class= "bodyoptions-stdm">
			<div class= "container-stdm">
				<div class="card-stdm" style="height: 100%;">
					<div class="box-image-stdm">
						<div class="image-wrapper">
					    @foreach($venue->venueimages->take(1) as $venueimage)<img src="data:image/jpeg;base64,{{$venueimage->imagefile}}"/>@endforeach
						</div>
					</div>
					<div class="content-stdm">
						<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $venue->venuename }}</h5></div>
						<div class="card-footer" style="text-align: center">€{{$venue->costtorent}}</div>
						<div class="card-footer" style="text-align: center"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> {{$venue->city}}</div>
						<div class="card-footer"><a  href="{{ route('venues.custshow', [$venue->id]) }}"><button id="custshow" style="background-color: #444452;" type="button" class="btn btn-primary1">Details <i class="fas fa-info-circle"></i></button></a></div>
						<div class="card-footer"><button id="vendisplay" type="button" class="btn btn-primary1 center-block vendisplay" onclick="handleCheckLogin('{{ url('calendar/vendisplay', [$venue->id]) }}')">Book Venue <i class="far fa-calendar-alt"></i></button></div>
						<div class="card-footer">
							<input id="fieldRating" name="rating" 
							value="{!! round($venue->venueratings->avg('rating'),2); !!}" 
							type="hidden" data-theme="krajee-fas" class="rating rating-loading" data-min=0 
							data-max=5 data-step=1 data-size="sm" data-display-only="true">
						</div>
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

@endsection('content')