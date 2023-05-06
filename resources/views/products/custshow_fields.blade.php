<section>
	<div class="container">
		<div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap; margin-left: 30px;">
			<div>
				<!-- Productimg Field -->
				<div>
					<img  style="box-shadow: 0 6px 21px rgba(0,0,0,1);" class="img-responsive" src="{{ $product->productimg }}">
				</div>
			</div>
			
			<div style="margin-left: 50px;">
				<!-- Productname Field -->
				<div class="col-sm-12">
					<p style="font-size: 14pt;">Details for {{ $product->productname }}</p>
				</div>			
				<!-- Producttype Field -->
				<div class="col-sm-12">
					{!! Form::label('producttype', 'Product Type:') !!}
					<p>{{ $product->producttype }}</p>
				</div>

				<!-- Productdesc Field -->
				<div class="col-sm-12">
					{!! Form::label('productdesc', 'Description:') !!}
					<p>{{ $product->productdesc }}</p>
				</div>

				<!-- Productcost Field -->
				<div class="col-sm-12">
					{!! Form::label('productcost', 'Price:') !!}
					<p>€ {{ $product->productcost }}</p>
				</div>

				<!-- Productquantity Field 
				<div class="col-sm-12">
					{!! Form::label('productquantity', 'Productquantity:') !!}
					<p>{{ $product->productquantity }}</p>
				</div> -->

				<div>
					<a class="btn btn-primary1" href="{{ route('products.displaygrid') }}">Back</a>
					<button id="addItem" type="button" class="btn btn-primary1 addItem" value="{{$product->id}}">Add to Cart<i class='far fa-shopping-cart' style='font-size: 1.em; margin-left: 3px;'></i></button>
				</div>				
				
			</div>
		</div>
	</div>
</section>

<style>

.col-lg-8 {
	max-width: 900px;
}

.card {
	background-color: transparent;
}

section {
	box-shadow: 0 6px 21px rgba(0,0,0,1);
}

.card {
	border: none;
}

</style>
