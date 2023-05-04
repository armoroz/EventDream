<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
        <tr>
            <th>Eventdate</th>
		<th>Event Name</th>
        <th>Eventtime</th>
        <th>Orderplacedon</th>
        <th>Eventordertotal</th>
        <th>Eventdiscount</th>
		<th>numOfGuests</th>
		<th>eventstatus</th>
        <th>Venueid</th>
        <th>Customerid</th>
        <th>Userid</th>
        <th>Standardmenuid</th>
        <th>Custommenuid</th>
        <th>Deliveryid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->eventdate }}</td>
			<td>{{ $event->eventname }}</td>
            <td>{{ $event->eventtime }}</td>
            <td>{{ $event->orderplacedon }}</td>
            <td>{{ $event->eventordertotal }}</td>
            <td>{{ $event->eventdiscount }}</td>
			<td>{{ $event->numOfGuests }}</td>
			<td>{{ $event->eventstatus }}</td>
            <td>{{ $event->venue->venuename ?? 'N/A' }}</td>
            <td>{{ $event->customer->firstname ?? 'N/A' }}</td>
            <td>{{ $event->userid }}</td>
            <td>{{ $event->standardmenuid }}</td>
            <td>{{ $event->custommenuid }}</td>
            <td>{{ $event->deliveryid }}</td>
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
