<!-- Productname Field -->
<div class="col-sm-12">
    {!! Form::label('productname', 'Productname:') !!}
    <p>{{ $product->productname }}</p>
</div>

<!-- Producttype Field -->
<div class="col-sm-12">
    {!! Form::label('producttype', 'Producttype:') !!}
    <p>{{ $product->producttype }}</p>
</div>

<!-- Productdesc Field -->
<div class="col-sm-12">
    {!! Form::label('productdesc', 'Productdesc:') !!}
    <p>{{ $product->productdesc }}</p>
</div>

<!-- Productcost Field -->
<div class="col-sm-12">
    {!! Form::label('productcost', 'Productcost:') !!}
    <p>{{ $product->productcost }}</p>
</div>

<!-- Productquantity Field -->
<div class="col-sm-12">
    {!! Form::label('productquantity', 'Productquantity:') !!}
    <p>{{ $product->productquantity }}</p>
</div>

<!-- Productimg Field -->
<div><td><img class="img-responsive left-block" 
	height="200px" width="200px" src="{{ $product->productimg }}">
</td></div>

