<!-- Custommenuname Field -->
<!--<div class="col-sm-12">
    {!! Form::label('custommenuname', 'Custom Menu Name:') !!}
    <p>{{ $custommenu->custommenuname }}</p>
</div>-->

<!-- Description Field -->
<!--<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $custommenu->description }}</p>
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

ul {
list-style: none;
padding: 0;
margin: 0;
}
</style>

<div class="custom-menu-container">
  <div class="col-sm-12">
    <span class="custom-menu-label">Custom Menu Name</span>
    <span class="custom-menu-name">{{ $custommenu->custommenuname }}</span>
  </div>

<div class="col-sm-12">
  <span class="custom-menu-label">Menu Items List</span>
  <ul class="custom-menu-list">
    @foreach(explode(',', $custommenu->description) as $item)
      <li><i class='fad fa-check-circle fa-lg' style='color:#419b56'></i>{{ $item }}</li>
    @endforeach
  </ul>
</div>
</div>

<table class="table table-condensed table-bordered">
<thead> 
					<tr> <th>Name</th><th>Image</th><th>Price</th> </tr>
				</thead>
				<tbody>
    {!! Form::label('menuitem', 'Menu Items:') !!}
    @foreach($custommenu->menuitems as $menuitem)
	<tr>
        <td>{{ $menuitem->menuitemname }}</td>
		<td><img class="img-responsive left-block" 
	style="max-height: 100px; min-height: 100px; max-width:150px; min-width: 150px;" src="{{ $menuitem->menuitemimglink }}"></td>
	<td>€{{$menuitem->menuitemcost}} </td>	
	</tr>
	</tbody>
    @endforeach
</table>

 