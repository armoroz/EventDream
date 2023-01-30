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

<!-- Productimglink Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productimglink', 'Productimglink:') !!}
    {!! Form::text('productimglink', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Prodaddedon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prodaddedon', 'Prodaddedon:') !!}
    {!! Form::text('prodaddedon', null, ['class' => 'form-control','id'=>'prodaddedon']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#prodaddedon').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Produpdatedon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produpdatedon', 'Produpdatedon:') !!}
    {!! Form::text('produpdatedon', null, ['class' => 'form-control','id'=>'produpdatedon']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#produpdatedon').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Proddeletedon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proddeletedon', 'Proddeletedon:') !!}
    {!! Form::text('proddeletedon', null, ['class' => 'form-control','id'=>'proddeletedon']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#proddeletedon').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userid', 'Userid:') !!}
    {!! Form::number('userid', null, ['class' => 'form-control']) !!}
</div>