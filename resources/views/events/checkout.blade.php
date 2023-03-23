@extends('layouts.app') 
@section('content') 
<H2>Place Order</h2> 
{{ Form::open(array('url' => 'events/all/placeorder', 'method' => 'post')) }} 
@csrf <table class="table table-condensed table-bordered"> 
    <thead> 
        <tr><th>Image</th><th>Id</th><th>Name</th><th>Type</th><th>Description</th><th>Price</th><th>Quantity</th>
        </tr>
    </thead> 
    <tbody> 
    @php $ttlCost=0; $ttlQty=0;@endphp 
    @foreach ($lineitems as $lineitem)
        @php $product=$lineitem['product']; @endphp 
        <tr> 
              <td><div class="panel-body"><img style="width:30%;height:30%;" class="img-responsive center-block" src="{{ $product->productimg }}"/></div></td>
			  <td><input size="3" style="border:none" type="text" name="productid[]" readonly value="{{ $product->id }}"></td> 
              <td>{{ $product->productname }}</td> 
              <td>{{ $product->producttype }}</td>
              <td>{{ $product->productdesc }}</td>
              <td><div class="price">{{ $product->productcost }}</div></td> 
              <td> <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="<?php echo $lineitem['qty'] ?>"> </td> 
              <td> 
                  <button type="button" class="btn btn-default add"><span class="glyphicon glyphicon-plus"/></button> 
                  <button type="button" class="btn btn-default subtract"><span class="glyphicon glyphicon-minus"/></button> 
                  <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="glyphicon glyphicon-remove"/></button>			  
              </td>
              @php $ttlQty = $ttlQty + $lineitem['qty']; $ttlCost = $ttlCost + ($product->productcost*$lineitem['qty']); 
              @endphp 
        </tr>
    @endforeach

    @foreach ($lineitems as $lineitem)
		@if (isset($lineitem['venue']))
        @php $venue=$lineitem['venue']; @endphp 
        <tr> 
              <td>@foreach($venue->venueimages->take(1) as $venueimage)		
            <div class="panel-body"><img class="img-responsive center-block" height="30%" width="30%" src="data:image/jpeg;base64,{{$venueimage->imagefile}}"></div>@endforeach</td>
			  <td><input size="3" style="border:none" type="text" name="venueid[]" readonly value="{{ $venue->id }}"></td> 
              <td>{{ $venue->venuename }}</td> 
              <td>{{ $venue->addressline1 }}</td>
              <td>{{ $venue->addressline2 }}</td>
              <td><div class="price">{{ $venue->costtorent}}</div></td> 
              <td> <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="<?php echo $lineitem['qty'] ?>"> </td> 
              <td> 
                  <button type="button" class="btn btn-default add"><span class="glyphicon glyphicon-plus"/></button> 
                  <button type="button" class="btn btn-default subtract"><span class="glyphicon glyphicon-minus"/></button> 
                  <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="glyphicon glyphicon-remove"/></button>			  
              </td>
              @php $ttlQty = $ttlQty + $lineitem['qty']; $ttlCost = $ttlCost + ($venue->costtorent*$lineitem['qty']); 
              @endphp 
        </tr> 
		@endif
    @endforeach
	
    @foreach ($lineitems as $lineitem)
		@if (isset($lineitem['standardmenu']))
        @php $standardmenu=$lineitem['standardmenu']; @endphp 
        <tr>
			  <td>@foreach($standardmenu->standardmenuimages->take(1) as $standardmenuimage)		
				<div class="panel-body"><img class="img-responsive center-block" height="30%" width="30%" src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}"></div>@endforeach
			  </td>
			  <td><input size="3" style="border:none" type="text" name="standardmenuid[]" readonly value="{{ $standardmenu->id }}"></td> 
              <td>{{ $standardmenu->standardmenuname }}</td> 
              <td>{{ $standardmenu->style }}</td>
              <td>{{ $standardmenu->course }}</td>
              <td><div class="price">{{ $standardmenu->course}}</div></td> 
              <td> <input size="3" style="border:none" class="qty" type="text" name="quantity[]" readonly value="<?php echo $lineitem['qty'] ?>"> </td> 
              <td> 
                  <button type="button" class="btn btn-default add"><span class="glyphicon glyphicon-plus"/></button> 
                  <button type="button" class="btn btn-default subtract"><span class="glyphicon glyphicon-minus"/></button> 
                  <button type="button" class="btn btn-default" value="remove" onClick="$(this).closest('tr').remove();"><span class="glyphicon glyphicon-remove"/></button>			  
              </td>
        </tr> 
		@endif
    @endforeach
    </tbody>

</table> 
<p style="text-align:right; font-size:18px; padding:10px; border:solid white 1px;">Total: €<label>{{ $ttlCost }}</label></p>
<button type="submit" class="btn btn-primary">Submit</button> {{ Form::close() }} 
@endsection 