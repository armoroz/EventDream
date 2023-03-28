@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 



<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Standard Menus</h1>
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
    <!--<div class='d-flex flex-wrap align-content-start bg-light'>-->
    @foreach($standardmenus as $standardmenu) 
        <!--<div class="p-2 border col-4 g-3"> 
            <div class="card text-center">-->
				<div class= "dpg-bodymenuoptions">
				  <div class= "dpg-container">
					<div class="dpg-menucard">
						<div class="dpg-box-image">
							@foreach($standardmenu->standardmenuimages->take(1) as $standardmenuimage)<img src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}">@endforeach
						</div>
						<div class="dpg-content">
						<div class="card-header d-block"><h5 class="mx-auto d-block">{{ $standardmenu->standardmenuname }} {{ $standardmenu->standardmenudesc }} {{ $standardmenu->standardmenutype }}</h5></div>
						<div class="card-footer" style="text-align: center">€{{$standardmenu->standardmenucost}}</div>
						<div class="card-footer"><button id="addItem" type="button" class="btn btn-success mx-auto d-block addItem" value="{{$standardmenu->id}}">Add To Cart</button></div>
						<div class="card-footer"><a  href="{{ route('standardmenus.custshow', [$standardmenu->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a></div>
						<div class="card-footer"><a href="{{ route('standardmenuratings.showstandardmenuratings', [$standardmenu->id] )}}">
							<input id="fieldRating" name="rating" 
							value="{!! round($standardmenu->standardmenuratings->avg('rating'),2); !!}" 
							type="text" data-theme="krajee-fas" class="rating rating-loading" data-min=0 
							data-max=5 data-step=1 data-size="sm" data-display-only="true"></a>
						</div>		
			        </div> 
		        </div>
			</div> 
		</div> 
</html>
    @endforeach
    



<script>
$(".bth,.addItem").click(function() {
    var total = parseInt($('#shoppingcart').text());
    var i=$(this).val();
    $('#shoppingcart').text(total);    
    $.ajax({
      type: "get",
      url: "{{url('standardmenus/additem/')}}" + "/" + i,
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
    type: "get", url: "{{ url('standardmenus/all/emptycart')   }}",
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