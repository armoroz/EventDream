<!-- Standardmenuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standardmenuid', 'Standardmenuid:') !!}
    {!! Form::number('standardmenuid', $standardmenuid, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::number('rating', null, ['class' => 'rating', 'data-min' => 0, 'data-max' => 5, 'data-step' => 1, 'data-size' => 'sm']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

