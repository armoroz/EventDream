
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
}
</style>


<section>
	<div class="container">
        <div class="carousel-details-wrapper" style="display: flex; flex-wrap: wrap;">
           <div class="content">		
           <p style="font-size: 14pt;">Details for Custom Menu: {{ $custommenu->custommenuname }}</p>
    
  


			<table class="table table-condensed table-bordered">
				<thead> 
					<tr> <th>Name</th><th>Image</th><th>Price</th> </tr>
				</thead>
				<tbody>
				{!! Form::label('menuitem', 'Menu Items:') !!}
				@foreach($custommenu->menuitems as $menuitem)
				<tr>
					<td><i class='fad fa-check-circle fa-lg' style='color:#419b56'></i>{{ $menuitem->menuitemname }}</td>
					<td><img class="img-responsive left-block" 
				style="max-height: 100px; min-height: 100px; max-width:150px; min-width: 150px;" src="{{ $menuitem->menuitemimglink }}"></td>
				<td>€{{$menuitem->menuitemcost}} </td>	 
				</tr>
				</tbody>
				@endforeach
			</table>
			
				<!-- Button Field -->
				<div>
					<a class="btn btn-primary" href="{{ route('custommenus.displaygrid') }}">Back<i class='far fa-arrow-alt-up fa-9x fa-rotate-270' style='font-size: 1.2em; margin-left: 5px;'></i></a>
					<a class="btn btn-primary" href="{!! route('custommenus.assignmenuitems', [$custommenu->id]) !!}">Update Dishes<i class='far fa-hat-chef' style='font-size: 1.2em; margin-left: 5px;'></i></a>	

				</div>
				
			</div>
		</div>
	</div>

</section>

 