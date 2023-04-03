<!-- Customerid Field -->
{!! Form::hidden('customerid', $customerid, ['class' => 'form-control', 'readonly' => 'true']) !!}

<!-- Standardmenuid Field -->
{!! Form::hidden('standardmenuid', $standardmenuid, ['class' => 'form-control', 'readonly' => 'true']) !!}

<!-- Standardmenuname Field -->
<div class="form-group col-sm-6"> 
<input type="text" class="form-control" value="{{$standardmenu->standardmenuname}}" readonly/>
</div>		  
			  
<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::number('rating', null, ['data-theme' => 'krajee-fas', 'class' => 'rating', 'data-min' => 0, 'data-max' => 5, 'data-step' => 1, 'data-size' => 'sm']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

