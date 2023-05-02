<!-- Eventdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventdate', 'Eventdate:') !!}
    {!! Form::text('eventdate', null, ['class' => 'form-control','id'=>'eventdate']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#eventdate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Eventtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventtime', 'Eventtime:') !!}
    {!! Form::text('eventtime', null, ['class' => 'form-control']) !!}
</div>

<!-- Orderplacedon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderplacedon', 'Orderplacedon:') !!}
    {!! Form::text('orderplacedon', null, ['class' => 'form-control','id'=>'orderplacedon']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#orderplacedon').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- No. of Guests Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numOfGuests', 'No. of Guests:') !!}
    {!! Form::number('numOfGuests', null, ['class' => 'form-control']) !!}
</div>

<!-- Event Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventstatus', 'Event Status:') !!}
    {!! Form::text('eventstatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Eventordertotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventordertotal', 'Eventordertotal:') !!}
    {!! Form::number('eventordertotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Eventdiscount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventdiscount', 'Eventdiscount:') !!}
    {!! Form::number('eventdiscount', null, ['class' => 'form-control']) !!}
</div>

<!-- Venueid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('venueid', 'Venueid:') !!}
    {!! Form::number('venueid', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerid', 'Customerid:') !!}
    {!! Form::number('customerid', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userid', 'Userid:') !!}
    {!! Form::number('userid', null, ['class' => 'form-control']) !!}
</div>

<!-- Standardmenuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standardmenuid', 'Standardmenuid:') !!}
    {!! Form::number('standardmenuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Custommenuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('custommenuid', 'Custommenuid:') !!}
    {!! Form::number('custommenuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliveryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliveryid', 'Deliveryid:') !!}
    {!! Form::number('deliveryid', null, ['class' => 'form-control']) !!}
</div>