<!-- Venuename Field -->
<div class="form-group col-sm-6">
    {!! Form::label('venuename', 'Venuename:') !!}
    {!! Form::text('venuename', null, ['class' => 'form-control','maxlength' => 40,'maxlength' => 40]) !!}
</div>

<!-- Addressline1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('addressline1', 'Addressline1:') !!}
    {!! Form::text('addressline1', null, ['class' => 'form-control','maxlength' => 40,'maxlength' => 40]) !!}
</div>

<!-- Addressline2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('addressline2', 'Addressline2:') !!}
    {!! Form::text('addressline2', null, ['class' => 'form-control','maxlength' => 40,'maxlength' => 40]) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Eircode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eircode', 'Eircode:') !!}
    {!! Form::text('eircode', null, ['class' => 'form-control','maxlength' => 7,'maxlength' => 7]) !!}
</div>

<!-- Humancapacity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('humancapacity', 'Humancapacity:') !!}
    {!! Form::number('humancapacity', null, ['class' => 'form-control']) !!}
</div>

<!-- Costtorent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costtorent', 'Costtorent:') !!}
    {!! Form::number('costtorent', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userid', 'Userid:') !!}
    {!! Form::number('userid', null, ['class' => 'form-control']) !!}
</div>