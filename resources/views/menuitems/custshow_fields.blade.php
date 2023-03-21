<!-- Menuitemname Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemname', 'Menu Item Name:') !!}
    <p>{{ $menuitem->menuitemname }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemdesc', 'Description:') !!}
    <p>{{ $menuitem->menuitemdesc }}</p>
</div>

<!-- Nutrition Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemnutrition', 'Nutrition:') !!}
    <p>{{ $menuitem->menuitemnutrition }}</p>
</div>

<!-- Allergens Field -->
<div class="col-sm-12">
    {!! Form::label('menuitemallergens', 'Allergens:') !!}
    <p>{{ $menuitem->menuitemallergens }}</p>
</div>

<!-- Course Field -->
<div class="col-sm-12">
    {!! Form::label('course', 'Course:') !!}
    <p>{{ $menuitem->course }}</p>
</div>

<!-- MenuItemimg Field -->
<div><td><img class="img-responsive left-block" 
	height="200px" width="200px" src="{{ $menuitem->menuitemimglink }}">
</td></div>