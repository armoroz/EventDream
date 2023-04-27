@extends('layouts.app') 
@section('content') 

<H2>Place Order</h2> 
{{ Form::open(array('url' => 'events/all/placeorder', 'method' => 'post')) }} 
@csrf
<input type="hidden" name="customerid" value="{{ Auth::user()->customer->id }}">
 <table class="table table-condensed table-bordered"> 
    <thead> 
        <tr><th>Image</th><th>Name</th><th>Type</th><th>Description</th><th>Price</th><th>Quantity</th><th></th>
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
	
        @elseif(isset($lineitem['product']))
        @php $item = $lineitem['product']; @endphp
        <tr> 
              <td><div class="panel-body"><img style="width:30%;height:30%;" class="img-responsive center-block" src="{{ $item->productimg }}"/></div></td>
			  <input size="3" style="border:none" type="hidden" name="productid[]" readonly value="{{ $item->id }}">
              <td>{{ $item->productname }}</td> 
              <td>{{ $item->producttype }}</td>
              <td>{{ $item->productdesc }}</td>
              <td><div class="price">{{ $item->productcost }}</div></td> 
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
			  <td>@foreach($item->standardmenuimages->take(1) as $standardmenuimage)		
				<div class="panel-body"><img class="img-responsive center-block" height="30%" width="30%" src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}"></div>@endforeach
			  </td>
			  <input size="3" style="border:none" type="hidden" name="standardmenuid[]" readonly value="{{ $item->id }}"> 
              <td>{{ $item->standardmenuname }}</td> 
              <td>{{ $item->style }}</td>
              <td>{{ $item->course }}</td>
              <td><div class="price">{{ $item->course}}</div></td> 
              <td> <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="<?php echo $lineitem['qty'] ?>"> </td> 
              <td style="white-space: nowrap;"> 
                  <button type="button" class="btn btn-default add"><span class="fas fa-plus"/></button> 
                  <button type="button" class="btn btn-default subtract"><span class="fas fa-minus"/></button> 
                  <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="fas fa-times"/></button>			  
              </td>
        </tr> 
	
		@elseif(isset($lineitem['custommenu']))
        @php $item = $lineitem['custommenu']; @endphp
        <tr>
			  <td>{{ $item->custommenuname }}</td>
			  <input size="3" style="border:none" type="hidden" name="custommenuid[]" readonly value="{{ $item->id }}">
              <td>{{ $item->custommenuname }}</td> 
              <td>{{ $item->description }}</td>
              <td>{{ $item->custommenuname }}</td>
              <td><div class="price">{{ $item->custommenuname}}</div></td> 
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
	@endforeach
	
    </tbody>

</table> 
{{ Form::close() }}
<p style="text-align:right; font-size:18px; padding:10px; border:solid white 1px;">Total: €<label>{{ $ttlCost }}</label></p>
<form action="{{route('stripe.checkout')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="lineitems" value="{{ urlencode(serialize($lineitems)) }}">
    <button type="submit" class="btn btn-primary">Continue to Payment <span class="fab fa-stripe"/></button>
</form>

<form action="{{route('projects.createproject')}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="lineitems" value="{{ urlencode(serialize($lineitems)) }}">
    <button type="submit" class="btn btn-primary">Create Project <span class="fab fa-stripe"/></button>
</form>

@endsection 