<!-- Productname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productname', 'Productname:') !!}
    {!! Form::text('productname', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>

<!-- Producttype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producttype', 'Producttype:') !!}
    {!! Form::text('producttype', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>

<!-- Productdesc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('productdesc', 'Productdesc:') !!}
    {!! Form::textarea('productdesc', null, ['class' => 'form-control']) !!}
</div>

<!-- Productcost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productcost', 'Productcost:') !!}
    {!! Form::number('productcost', null, ['class' => 'form-control']) !!}
</div>

<!-- Productlocation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productlocation', 'Productlocation:') !!}
    {!! Form::text('productlocation', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>

<!-- Productquantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productquantity', 'Productquantity:') !!}
    {!! Form::number('productquantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Productimg Field 
<div class="form-group col-sm-6">
    {!! Form::label('productimg', 'Product Image:') !!}
    {!! Form::text('productimg', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>-->

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userid', 'Userid:') !!}
    {!! Form::number('userid', null, ['class' => 'form-control']) !!}
</div>
<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productimg', 'Product Image:') !!}
    {!! Form::file('productimg', null, ['class' => 'form-control']) !!}
</div>