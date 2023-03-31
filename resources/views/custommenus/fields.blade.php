<!-- Custommenuname Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('custommenuname', 'Custom Menu Name:') !!}
    {!! Form::text('custommenuname', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>-->

<!-- Description Field -->
<!--<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Menu Items List:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>-->

<style>
.custom-menu-label {
  display: block;
  font-weight: bold;
  margin-bottom: 0.5rem;
  text-transform: uppercase;
  text-align: center;
}

.custom-menu-list {
  display: block;
  margin-bottom: 1rem;
  text-align: left;
  padding-left: 0;
}

.custom-menu-name {
  display: block;
  margin-bottom: 1rem;
  text-align: center;
}

ul {
list-style: none;
padding: 0;
margin: 0;
}

.custom-menu-container {
	margin: 0 auto;
	padding: 1rem;
	border: 1px solid #ccc;
	border-radius: 0.25rem;
	background-color: #f8f8f8;
	text-align: center;
	max-width: 500px; 
	width: auto;
}

</style>

<!-- Description Field -->
<div class="custom-menu-container">
<div class="form-group col-sm-12 col-lg-12">
    <span class="custom-menu-label">Custom Menu Name</span>
    <span class="custom-menu-name">{!! Form::text('custommenuname', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}</span>
</div>

	<div class="form-group col-sm-12 col-lg-12">
	  <span class="custom-menu-label">Menu Items List</span>
	  <ul class="custom-menu-list">
		@foreach(explode(',', $custommenu->description) as $item)
		  <li><i class='fad fa-check-circle fa-lg' style='color:#419b56'></i>{{ $item }}</li>
		@endforeach
	  </ul>
	</div>
</div>


<!-- Customerid Field -->
{!! Form::hidden('customerid', Auth::user()->customer->id) !!}

