<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
        <tr>
		<th>Venue</th>
        <th>Date</th>
		<th>Name</th>
        <th>Time</th>
        <th>Order Placed On</th>
        <th>Order Total</th>
        <th>Discount</th>
		<th>No. of Guests</th>
		<th>Status</th>
        <th>Customer</th>
        <th>Standard Menu ID</th>
        <th>Custom Menu ID</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
			<td>{{ $event->venue->venuename ?? 'N/A' }}</td>
            <td>{{ $event->eventdate }}</td>
			<td>{{ $event->eventname }}</td>
            <td>{{ $event->eventtime }}</td>
            <td>{{ $event->orderplacedon }}</td>
            <td>{{ $event->eventordertotal }}</td>
            <td>{{ $event->eventdiscount }}</td>
			<td>{{ $event->numOfGuests }}</td>
			<td>{{ $event->eventstatus }}</td>
            <td>{{ $event->customer->firstname ?? 'N/A' }}</td>
            <td>{{ $event->standardmenuid }}</td>
            <td>{{ $event->custommenuid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('events.show', [$event->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('events.edit', [$event->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
