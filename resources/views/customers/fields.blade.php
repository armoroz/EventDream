<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname', 'Firstname:') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>

<!-- Surname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surname', 'Surname:') !!}
    {!! Form::text('surname', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    {!! Form::text('dob', null, ['class' => 'form-control','id'=>'dob']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#dob').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
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

<!-- Cardno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cardno', 'Cardno:') !!}
    {!! Form::password('cardno', ['class' => 'form-control', 'placeholder' => 'Card No.']) !!}
</div>

<!-- Cardexpiry Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cardexpiry', 'Cardexpiry:') !!}
    {!! Form::password('cardexpiry', ['class' => 'form-control', 'placeholder' => 'Expiry']) !!}
</div>

<!-- Cvv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cvv', 'CVV:') !!}
{!! Form::password('cvv', ['class' => 'form-control', 'placeholder' => 'CVV']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Pass Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pass', 'Password:') !!}
    {!! Form::password('pass', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
</div>