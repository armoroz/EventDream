@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 



    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('venues.custshow_fields')					
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

<script>
let isAuthenticated = @json(auth()->check());

function handleRateVenue(url) {
  if (isAuthenticated) {
    window.location.href = url;
  } else {
    let result = confirm('You must login or sign up to view this page. Click OK to login or Cancel to stay on this page.');
    if (result) {
      window.location.href = '{{ url("login") }}';
    }
  }
}
</script>

@endsection('content')