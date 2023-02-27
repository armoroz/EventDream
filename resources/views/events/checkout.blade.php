@extends('layouts.app') 
@section('content') 
<H2>Place Order</h2> 
{{ Form::open(array('url' => 'events/placeorder', 'method' => 'post')) }} 
@csrf <table class="table table-condensed table-bordered"> 
    <thead> 
        <tr><th>Id</th><th>Name</th><th>Type</th><th>Description</th><th>Price</th><th>Quantity</th>
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
                  <button type="button" class="btn btn-default value="remove" onClick="$(this).closest('tr').remove();"><span class="glyphicon glyphicon-remove"/></button>			  
              </td>
              @php $ttlQty = $ttlQty + $lineitem['qty']; $ttlCost = $ttlCost + ($product->productcost*$lineitem['qty']); 
              @endphp 
        </tr> 
    @endforeach

    @foreach ($lineitems as $lineitem)
		@if (isset($lineitem['venue']))
        @php $venue=$lineitem['venue']; @endphp 
        <tr> 
              <td><div class="panel-body"><img style="width:30%;height:30%;" class="img-responsive center-block" src="{{ $venue->venueimg }}"/></div></td>
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
    </tbody>

</table> 
<p style="text-align:right; font-size:18px; padding:10px; border:solid white 1px;">Total: €<label>{{ $ttlCost }}</label></p>
<button type="submit" class="btn btn-primary">Submit</button> {{ Form::close() }} 
@endsection 