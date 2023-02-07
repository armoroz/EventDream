<div class="table-responsive">
    <table class="table" id="eventproductlogs-table">
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
        @foreach($eventproductlogs as $eventproductlog)
            <tr>
                <td>{{ $eventproductlog->eventproductquantity }}</td>
            <td>{{ $eventproductlog->eventid }}</td>
            <td>{{ $eventproductlog->productid }}</td>
            <td>{{ $eventproductlog->totalcost }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['eventproductlogs.destroy', $eventproductlog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('eventproductlogs.show', [$eventproductlog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('eventproductlogs.edit', [$eventproductlog->id]) }}"
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
