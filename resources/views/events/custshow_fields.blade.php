<!-- Eventdate Field -->
<div class="col-sm-12">
    {!! Form::label('eventdate', 'Event Date:') !!}
    <p>{{ $event->eventdate }}</p>
</div>

<!-- Eventtime Field -->
<div class="col-sm-12">
    {!! Form::label('eventtime', 'Event Time:') !!}
    <p>{{ $event->eventtime }}</p>
</div>

<!-- Orderplacedon Field -->
<div class="col-sm-12">
    {!! Form::label('orderplacedon', 'Order Date:') !!}
    <p>{{ $event->orderplacedon }}</p>
</div>

<!-- Eventordertotal Field -->
<div class="col-sm-12">
    {!! Form::label('eventordertotal', 'Order Total:') !!}
    <p>{{ $event->eventordertotal }}</p>
</div>

<!-- Numofguests Field -->
<div class="col-sm-12">
    {!! Form::label('numOfGuests', 'No. of Guests:') !!}
    <p>{{ $event->numOfGuests }}</p>
</div>

<!-- Event status Field -->
<div class="col-sm-12">
    {!! Form::label('eventstatus', 'Event Status:') !!}
    <p>{{ $event->eventstatus }}</p>
</div>

<!-- Eventdiscount Field -->
<div class="col-sm-12">
    {!! Form::label('eventdiscount', 'Event Discount:') !!}
    <p>{{ $event->eventdiscount }}</p>
</div>

<!-- Venueid Field -->
<div class="col-sm-12">
    {!! Form::label('venueid', 'Venue') !!}
    <p>{{ $event->venueid }}</p>
</div>

<!-- Customerid Field -->
<div class="col-sm-12">
    {!! Form::label('customerid', 'Customer') !!}
    <p>{{ Auth::user()->customer->firstname }}</p>
</div>


<!-- Standardmenuid Field -->
<div class="col-sm-12">
    {!! Form::label('standardmenuid', 'Standard Menu') !!}
    <p>{{ $event->standardmenuid }}</p>
</div>

<!-- Custommenuid Field -->
<div class="col-sm-12">
    {!! Form::label('custommenuid', 'Custom Menu') !!}
    <p>{{ $event->custommenuid }}</p>
</div>

<!-- Event products field -->
<div class="col-sm-12">
    {!! Form::label('eventproducts', 'Event Products:') !!}
    <ul>
        @foreach($event->eventproductlogs as $eventProductLog)
            <li>
                {{ optional($eventProductLog->product)->productname }}
                {{ optional($eventProductLog->product)->productcost }}
                {{ optional($eventProductLog->product)->producttype }}
                {!! Form::open(['route' => ['eventproductlogs.custdestroy', $eventProductLog->id], $event->id, 'method' => 'delete', 'style' => 'display:inline']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete this product from the event?')"]) !!}
                {!! Form::close() !!}
            </li>
        @endforeach
    </ul>
</div>
