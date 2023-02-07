<!-- Bookedprodquantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookedprodquantity', 'Bookedprodquantity:') !!}
    {!! Form::number('bookedprodquantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Bookeddate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookeddate', 'Bookeddate:') !!}
    {!! Form::text('bookeddate', null, ['class' => 'form-control','id'=>'bookeddate']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#bookeddate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Bookedtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookedtime', 'Bookedtime:') !!}
    {!! Form::text('bookedtime', null, ['class' => 'form-control']) !!}
</div>

<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productid', 'Productid:') !!}
    {!! Form::number('productid', null, ['class' => 'form-control']) !!}
</div>

<!-- Venueid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('venueid', 'Venueid:') !!}
    {!! Form::number('venueid', null, ['class' => 'form-control']) !!}
</div>