@extends('layouts.app') 
@section('content') 

<H2 style="text-align: center; font-family: Garamond, serif;">Create Project</h2> 
{{ Form::open(array('url' => 'events/all/placeorder', 'method' => 'post')) }} 
@csrf
<input type="hidden" class="form-control" value="{{Auth::user()->customer->id}}" id="custid" name="customerid"/> 

 <table class="table table-condensed" style="background-color: white; box-shadow: 0 4px 10px rgba(0,0,0,0.5); border-radius: 15px;"> 
    <thead> 
        <tr><th>Image</th><th>Type</th><th>Name</th><th>Description</th><th>Price</th><th>Quantity</th><th></th>
        </tr>
    </thead> 
    <tbody> 
    @php $ttlCost=0; $ttlQty=0;@endphp 
    @foreach ($lineitems as $lineitem)
	
		@if(isset($lineitem['venue']))
		@php $item = $lineitem['venue']; @endphp
		<tr> 
			  <td>@foreach($item->venueimages->take(1) as $venueimage)		
			<div class="panel-body"><img class="img-responsive center-block" height="30%" width="30%" src="data:image/jpeg;base64,{{$venueimage->imagefile}}"></div>@endforeach</td>
			  <input size="3" style="border:none" type="hidden" name="venueid[]" readonly value="{{ $item->id }}">
			  <td>{{ $item->venuename }}</td> 
			  <td>{{ $item->addressline1 }}</td>
			  <td>{{ $item->addressline2 }}</td>
			  <td><div class="price">{{ $item->costtorent}}</div></td> 
			  <td> <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="<?php echo $lineitem['qty'] ?>"> </td> 
			  <td style="white-space: nowrap;"> 
				  <button type="button" class="btn btn-default add"><span class="fas fa-plus"/></button> 
				  <button type="button" class="btn btn-default subtract"><span class="fas fa-minus"/></button> 
				  <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="fas fa-times"/></button>			  
			  </td>
		</tr> 
		
		@elseif(isset($lineitem['standardmenu']))
        @php $item = $lineitem['standardmenu']; @endphp
        <tr>
			  <input size="3" style="border:none" type="hidden" name="standardmenuid[]" readonly value="{{ $item->id }}"> 
			  <td>@foreach($item->standardmenuimages->take(1) as $standardmenuimage)		
				<div class="panel-body"><img style="width:25%;height:25%; box-shadow: 0 6px 21px rgba(0,0,0,1);" src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}"></div>@endforeach
			  </td>
              <td class="headingg"><b>Standard Menu</b></td> 
              <td>{{ $item->standardmenuname }}</td>
              <td>{{ $item->course }}</td>
              <td><div class="price">€20 per person</div></td>
              <td><input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="1"></td>
              <td></td>
        </tr> 

		@elseif(isset($lineitem['custommenu']))
        @php $item = $lineitem['custommenu']; @endphp
        <tr>
			  <input size="3" style="border:none" type="hidden" name="custommenuid[]" readonly value="{{ $item->id }}">
			  <td><img style="width:25%;height:25%; box-shadow: 0 6px 21px rgba(0,0,0,1);" src="{{asset('img\custommenu1.jpg')}}"></td>
			  <td class="headingg"><b>Custom Menu</b></td>
			  <td>{{ $item->custommenuname }}</td>
              <td>{{ $item->description }}</td> 
              <td><div class="price">€20 per person</div></td> 
			  <td><input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="1"></td>
              <td></td>
        </tr> 		
	
        @elseif(isset($lineitem['product']))
        @php $item = $lineitem['product']; @endphp
        <tr> 
              <input size="3" style="border:none" type="hidden" name="productid[]" readonly value="{{ $item->id }}">
			  <td><div class="panel-body"><img style="width:25%;height:25%; box-shadow: 0 6px 21px rgba(0,0,0,1);"  src="{{ $item->productimg }}"/></div></td>
			  <td class="headingg"><b>Decor</b></td>
              <td>{{ $item->productname }} {{ $item->producttype }}</td> 
              <td>{{ $item->productdesc }}</td>
              <td><div class="price">{{ $item->productcost }}</div></td> 
              <td> <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="<?php echo $lineitem['qty'] ?>"> </td> 
              <td style="white-space: nowrap;"> 
                  <button type="button" class="btn btn-default add"><span class="fas fa-plus"/></button> 
                  <button type="button" class="btn btn-default subtract"><span class="fas fa-minus"/></button> 
                  <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="fas fa-times"/></button>			  
              </td>
        </tr>
	

	@endif
    @php $ttlQty = $ttlQty + $lineitem['qty']; @endphp
    @php $ttlCost = $ttlCost + (($item->productcost + $item->costtorent) * $lineitem['qty']); @endphp
	@if(isset($lineitem['standardmenu']))
		@php $ttlCost = $ttlCost + 20; @endphp
	@elseif(isset($lineitem['custommenu']))
		@php $ttlCost = $ttlCost + 20; @endphp
	@endif
	@endforeach
	
    </tbody>

</table> 
{{ Form::close() }}

<p style="text-align:right; font-size:18px; padding:10px; border-radius: 15px; background-color: white; box-shadow: 0 4px 10px rgba(0,0,0,0.5);">Total: €<label>{{ $ttlCost }}</label></p>

<!--<form action="{{route('stripe.checkout')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="lineitems" value="{{ urlencode(serialize($lineitems)) }}">
    <button type="submit" class="btn btn-primary">Continue to Payment <span class="fab fa-stripe"/></button>
</form>

<form action="{{route('events.placeorder')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="lineitems" value="{{ urlencode(serialize($lineitems)) }}">
    <button type="submit" class="btn btn-primary">Create Event</button>
</form>-->

<form action="{{route('events.createprojectother')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="lineitems" value="{{ urlencode(serialize($lineitems)) }}">
    <button type="submit" class="btn btn-primary">Create Project</button>
</form>

@endsection 