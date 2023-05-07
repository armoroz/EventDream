<!-- Eventname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventname', 'Name:') !!}
    {!! Form::text('eventname', null, ['class' => 'form-control','id'=>'eventname']) !!}
</div>

<!-- Eventdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventdate', 'Date:') !!}
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
    {!! Form::label('eventtime', 'Time:') !!}
    {!! Form::text('eventtime', null, ['class' => 'form-control']) !!}
</div>

<!-- Orderplacedon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderplacedon', 'Order Placed On:') !!}
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
    {!! Form::label('eventstatus', 'Status:') !!}
    {!! Form::text('eventstatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Eventordertotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventordertotal', 'Order Total:') !!}
    {!! Form::number('eventordertotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Eventdiscount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eventdiscount', 'Discount:') !!}
    {!! Form::number('eventdiscount', null, ['class' => 'form-control']) !!}
</div>

<!-- Venueid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('venueid', 'Venue ID:') !!}
    {!! Form::number('venueid', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerid', 'Customer ID:') !!}
    {!! Form::number('customerid', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userid', 'User ID:') !!}
    {!! Form::number('userid', null, ['class' => 'form-control']) !!}
</div>

<!-- Standardmenuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standardmenuid', 'Standard Menu ID:') !!}
    {!! Form::number('standardmenuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Custommenuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('custommenuid', 'Custom Menu ID:') !!}
    {!! Form::number('custommenuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliveryid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliveryid', 'Delivery ID:') !!}
    {!! Form::number('deliveryid', null, ['class' => 'form-control']) !!}
</div>