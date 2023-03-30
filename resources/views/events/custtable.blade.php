<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
        <tr>
            <th>Eventdate</th>
        <th>Eventtime</th>
        <th>Orderplacedon</th>
        <th>Eventordertotal</th>
        <th>Eventdiscount</th>
        <th>Venueid</th>
        <th>Customerid</th>
        <th>Standardmenu</th>
        <th>Custommenu</th>
        <th>Deliveryid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->eventdate }}</td>
            <td>{{ $event->eventtime }}</td>
            <td>{{ $event->orderplacedon }}</td>
            <td>{{ $event->eventordertotal }}</td>
            <td>{{ $event->eventdiscount }}</td>
            <td>{{ $event->venueid }}</td>
            <td>{{ Auth::user()->customer->firstname }}</td>
            <td>{{ $event->standardmenuid }}</td>
            <td>{{ $event->custommenuid}}</td>
            <td>{{ $event->deliveryid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('events.show', [$event->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
