<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
        <tr>
        <th>Event Date</th>
		<th>Customer</th>
        <th>Event Time</th>
        <th>Order Date</th>
        <th>Order Total</th>
        <th>Venue</th>
        <th>Standard Menu</th>
        <th>Custom Menu</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
            <td>{{ $event->eventdate }}</td>
			<td>{{ Auth::user()->customer->firstname }}</td>
            <td>{{ $event->eventtime }}</td>
            <td>{{ $event->orderplacedon }}</td>
            <td>{{ $event->eventordertotal }}</td>
            <td>{{ $event->venue->venuename }}</td>
            <td>{{ $event->standardmenuid }}</td>
            <td>{{ $event->custommenuid}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('events.custshow', [$event->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
