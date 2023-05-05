@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 


    <div class="content px-3">
        <div class="card">
            <div class="card-body" style="max-width: 600px">
                <div class="row">
                    @include('custommenus.custshow_fields')
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