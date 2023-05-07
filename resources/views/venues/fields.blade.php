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

<!-- Indoor Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('indoor', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('indoor', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('indoor', 'Indoor', ['class' => 'form-check-label']) !!}
    </div>
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
	<input type="hidden" class="form-control" value="{{Auth::user()->id}}" id="userid" name="userid"/> 
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Lng Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lng', 'Lng:') !!}
    {!! Form::text('lng', null, ['class' => 'form-control']) !!}
</div>

