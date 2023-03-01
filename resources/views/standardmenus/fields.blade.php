<!-- Standardmenuname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standardmenuname', 'Standardmenuname:') !!}
    {!! Form::text('standardmenuname', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Style Field -->
<div class="form-group col-sm-6">
    {!! Form::label('style', 'Style:') !!}
    {!! Form::text('style', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Course Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course', 'Course:') !!}
    {!! Form::text('course', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userid', 'Userid:') !!}
    {!! Form::number('userid', null, ['class' => 'form-control']) !!}
</div>