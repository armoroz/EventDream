@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Custom Menu Details</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card" style="max-width: 400px">
            <div class="card-body">
                <div class="row">
                    @include('custommenus.custshow_fields')
					<div class="col-sm-6">
						<a href="{{ route('custommenus.displaygrid') }}"><button class="btn btn-back"><i class='far fa-arrow-alt-up fa-9x fa-rotate-270'></i></button></a>
						<a href="{!! route('custommenus.assignmenuitems', [$custommenu->id]) !!}" class="btn btn-updateDishes" title="Update Dishes"><i class='far fa-hat-chef'></i></a>	
						<button id="addItem" type="button" class="btn btn-addtoCart addItem" value="{{$custommenu->id}}"><i class='far fa-shopping-cart'></i></button>
					</div>		
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