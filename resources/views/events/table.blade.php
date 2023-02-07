<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
        <tr>
            <th>Eventproductquantity</th>
        <th>Eventid</th>
        <th>Productid</th>
        <th>Totalcost</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->eventproductquantity }}</td>
            <td>{{ $event->eventid }}</td>
            <td>{{ $event->productid }}</td>
            <td>{{ $event->totalcost }}</td>
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
