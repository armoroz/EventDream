@extends('layouts.app') 
@section('content')
<style>
.control-label {
    text-align: right;
}
</style>

<section>
	<div class="container">
		<div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap; margin-left: 30px;">
			
				<h1>
					Menu Items for my Custom Menu: <b>{{$custommenu->custommenuname}}</b> 
				</h1>
			
			<div class="content">
				{!! Form::open(['route' => ['custommenus.updatemenuitems', $custommenu->id], 'method' => 'patch']) !!}
				<div class="row">
					<div class="col-sm-4">
						<table class="table table-condensed table-bordered"> 
							<thead> 
								<tr> 
									<th colspan="4" style="text-align: center;">Starters</th>
								</tr>
								<tr> 
									<th>Image</th>
									<th>Name</th>
									<th>Check</th>
									
								</tr>
							</thead> 
							<tbody> 
								@foreach($menuitems->where('course', 'starter') as $menuitem)
								<tr>
									<td><img height="100px" width="100px" src="{{ $menuitem->menuitemimglink }}"></td>
									<td><label class="control-label col-sm-10">{{$menuitem->menuitemname}}</label></td>
									<td><div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[]" value="{{$menuitem->id}}" 
										@if($custommenu->menuitems->contains($menuitem)) checked @endif ></div></td>
										
									<!--<td><div class="col-sm-2"><div class="checkbox">
										<input class="checkbox" type="checkbox" id="cbox-selectMenuItems-{{ $menuitem->id }}" name="menuitems[]" value="{{ $menuitem->id }}">
										<label for="cbox-selectMenuItems-{{ $menuitem->id }}"></label>
									</div></div></td>-->
								</tr>
								@endforeach
							</tbody>
						</table> 
					</div>
					<div class="col-sm-4">
						<table class="table table-condensed table-bordered"> 
							<thead> 
								<tr> 
									<th colspan="4" style="text-align: center;">Main Course</th>
								</tr>
								<tr> 
									<th>Image</th>
									<th>Name</th>
									<th>Check</th>
									
								</tr>
							</thead> 
							<tbody> 
								@foreach($menuitems->where('course', 'main') as $menuitem)
								<tr>
									<td><img height="100px" width="100px" src="{{ $menuitem->menuitemimglink }}"></td>
									<td><label class="control-label col-sm-10">{{$menuitem->menuitemname}}</label></td>
									<td><div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[]" value="{{$menuitem->id}}" 
										@if($custommenu->menuitems->contains($menuitem)) checked @endif ></div></td>
								</tr>
								@endforeach
							</tbody>
						</table> 
					</div>
					<div class="col-sm-4">
						<table class="table table-condensed table-bordered"> 
							<thead> 
								<tr> 
									<th colspan="4" style="text-align: center;">Desserts</th>
								</tr>
								<tr> 
									<th>Image</th>
									<th>Name</th>
									<th>Check</th>
								</tr>
							</thead> 
							<tbody> 
								@foreach($menuitems->where('course', 'dessert') as $menuitem)
								<tr>
									<td><img style="max-height:100px; width:100px;" src="{{ $menuitem->menuitemimglink }}"></td>
									<td><label class="control-label col-sm-10">{{$menuitem->menuitemname}}</label></td>
									<td><div class="col-sm-2"><input class="checkbox-inline" type="checkbox" name="menuitem[]" value="{{$menuitem->id}}" 
										@if($custommenu->menuitems->contains($menuitem)) checked @endif ></div></td>
								</tr>
								@endforeach
							</tbody>
						</table> 
					</div>
						<!-- Submit Fieldd -->
						<div class="form-group col-sm-12">
							{!! Form::submit('Update My Menu', ['class' => 'btn btn-primary']) !!}
							<a href="{!! route('custommenus.displaygrid') !!}" class="btn btn-default">Cancel</a>
							{!! Form::close() !!}
						</div>
				</div>
			</div>
		</div>
	</div>
</section>

<style>

.col-lg-8 {
	min-width: 1000px;
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

@endsection('content')           