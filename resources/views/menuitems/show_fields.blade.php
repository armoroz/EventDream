<!-- Menuitemname Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemname', 'Menuitemname:') !!}
    <p>{{ $menuitem->menuitemname }}</p>
</div>

<!-- Menuitemdesc Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemdesc', 'Menuitemdesc:') !!}
    <p>{{ $menuitem->menuitemdesc }}</p>
</div>

<!-- Menuitemnutrition Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemnutrition', 'Menuitemnutrition:') !!}
    <p>{{ $menuitem->menuitemnutrition }}</p>
</div>

<!-- Menuitemallergens Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemallergens', 'Menuitemallergens:') !!}
    <p>{{ $menuitem->menuitemallergens }}</p>
</div>

<!-- Menuitemcost Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemcost', 'Menuitemcost:') !!}
    <p>{{ $menuitem->menuitemcost }}</p>
</div>

<!-- Menuitemimglink Field -->
<div><td><img class="img-responsive left-block" 
	height="200px" width="200px" src="{{ $menuitem->menuitemimglink }}">
</td></div>

<!-- Userid Field -->
<div class="col-sm-12">
    {!! Form::label('userid', 'Userid:') !!}
    <p>{{ $menuitem->userid }}</p>
</div>

