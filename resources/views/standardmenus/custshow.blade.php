@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 

<style>
.col-sm-6 {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.btn-giveRating {
  margin-left: auto;
}

.btn-addtoCart {
  margin-left: 10px;
}



</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Standard Menu Details</h1>

                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
			@include('standardmenus.custshow_fields')
              <div class="row">
                <div class="col-sm-6">    
					<a href="{{ route('standardmenus.displaygrid') }}"><button class="btn btn-back"><i class='far fa-arrow-alt-up fa-9x fa-rotate-270'></i></button></a>
			        <a href="{!! route('standardmenuratings.ratestandardmenu', [$standardmenu->id]) !!}"><button class="btn btn-giveRating"><i class='far fa-stars'></i></button></a>
					<button id="addItem" type="button" class="btn btn-addtoCart addItem" value="{{$standardmenu->id}}"><i class='far fa-shopping-cart'></i></button>
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
    type: "get", url: "{{ url('standardmenus/emptycart')   }}",
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
