<!-- Menuitemname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menuitemname', 'Menuitemname:') !!}
    {!! Form::text('menuitemname', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Menuitemdesc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('menuitemdesc', 'Menuitemdesc:') !!}
    {!! Form::textarea('menuitemdesc', null, ['class' => 'form-control']) !!}
</div>

<!-- Menuitemnutrition Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('menuitemnutrition', 'Menuitemnutrition:') !!}
    {!! Form::textarea('menuitemnutrition', null, ['class' => 'form-control']) !!}
</div>

<!-- Menuitemallergens Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('menuitemallergens', 'Menuitemallergens:') !!}
    {!! Form::textarea('menuitemallergens', null, ['class' => 'form-control']) !!}
</div>

<!-- Menuitemcost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menuitemcost', 'Menuitemcost:') !!}
    {!! Form::number('menuitemcost', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menuitemimglink', 'Menu Item Image:') !!}
    {!! Form::file('menuitemimglink', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userid', 'Userid:') !!}
    {!! Form::number('userid', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course', 'Course:') !!}
    {!! Form::select('course', ['Starter' => 'Starter', 'Main' => 'Main', 'Dessert' => 'Dessert', 'Drink' => 'Drink'], null, ['class' => 'form-control']) !!}
</div>