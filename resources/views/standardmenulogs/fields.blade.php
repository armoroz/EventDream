<!-- Menuitemid Field -->
<div class="form-group col-sm-6">

	{!! Form::label('menuitemid', 'Menuitemid:') !!}
	<select name="menuitemid" class="form-control">
   @foreach ($menuitems as $menuitem)
		<option value='{{$menuitem->id}}'>{{$menuitem}}</option>
	@endforeach	
    </select>
</div>

<!-- Standardmenuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standardmenuid', 'Standardmenuid:') !!}
    {!! Form::number('standardmenuid', null, ['class' => 'form-control']) !!}
</div>