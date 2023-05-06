@extends('layouts.app')

@section('content')

<style>

.custom-menu-list {
  display: block;
  margin-bottom: 1rem;
  text-align: left;
  padding-left: 0;
}

table.table-bordered {
  border: 1px #999999;
  
}

ul {
list-style: none;
padding: 0;
margin: 0;
}

section {
	box-shadow: 0 6px 21px rgba(0,0,0,1);
	max-width: 375px;
}


.card {
	background-color: transparent;
	border-color: transparent;
	margin-top: 60px;
	margin-left: 160px;
}

.inline-button {
    display: inline-block;
    margin-right: 10px; /* Optional: Add some spacing between the buttons */
}

.custom-menu-name {
  display: block;
  margin-bottom: 1rem;
  text-align: center;
}

</style>


<section>
	<div class="container">
        <div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap;">
		@include('adminlte-templates::common.errors')
        {!! Form::model($custommenu, ['route' => ['custommenus.update', $custommenu->id], 'method' => 'patch']) !!}
		<!-- Customerid Field -->
        {!! Form::hidden('customerid', Auth::user()->customer->id) !!}
		
           <div class="content">		
			   <p style="font-size: 14pt;">Create Custom Menu:</p>
				<div class="form-group col-sm-12 col-lg-12">
					<span class="custom-menu-name">{!! Form::text('custommenuname', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}</span>
				</div>
		
				<table class="table table-condensed table-bordered">
					<thead> 
						<tr> <th>Name</th><th>Image</th><th>Price</th> </tr>
					</thead>
					<tbody>
						{!! Form::label('menuitem', 'Menu Items:') !!}
						@foreach($custommenu->menuitems as $menuitem)
						<tr>
							<td><i class='fad fa-check-circle fa-lg' style='color:#419b56'></i>{{ $menuitem->menuitemname }}</td>
							<td><img class="img-responsive" 
							style="max-height: 100px; min-height: 100px; max-width:150px; min-width: 150px; display: block; margin: auto;" src="{{ $menuitem->menuitemimglink }}"></td>
							<td>€{{$menuitem->menuitemcost}} </td>	 
						</tr>
					</tbody>
					@endforeach
				</table>
				
				<!-- Button Field -->
				<div>
					{!! Form::button('Create <i class="far fa-utensil-fork" style="font-size: 1.2em; margin-right: 5px;"></i>', ['type' => 'submit', 'class' => 'btn btn-primary1']) !!}

					<a href="{{ route('custommenus.displaygrid') }}" class="btn btn-default">Cancel</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
 
