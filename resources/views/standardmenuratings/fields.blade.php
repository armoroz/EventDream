<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::number('rating', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Standardmenuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standardmenuid', 'Standardmenuid:') !!}
    {!! Form::number('standardmenuid', null, ['class' => 'form-control']) !!}
</div>