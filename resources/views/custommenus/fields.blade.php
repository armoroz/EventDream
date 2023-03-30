<!-- Custommenuname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('custommenuname', 'Custommenuname:') !!}
    {!! Form::text('custommenuname', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field 
<div class="form-group col-sm-6">
    {!! Form::label('customerid', 'Customerid:') !!}
    {!! Form::number('customerid', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Customerid Field -->
{!! Form::hidden('customerid', Auth::user()->customer->id) !!}