@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<div class='d-flex flex-wrap align-content-start bg-light'> 
@foreach($custommenus as $custommenu) 
        <div class="col-sm-4">
            <div class="card text-center"> 
            <div class="card-header d-block">{{ $custommenu->custommenuname }} {{ $custommenu->description }}</div> 
            <div class="card-footer"><button id="addItem" type="button" class="btn btn-default center-block addItem" value="{{$custommenu->id}}">Add To Cart</button></div>		
			<div class="card-footer"><a  href="{{ route('custommenus.custshow', [$custommenu->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a></div>
			<div><a href="{!! route('custommenus.assignmenuitems', [$custommenu->id]) !!}" 
						    class="btn btn-default center-block" title="Update Dishes">Update Dishes
						</a></div>
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