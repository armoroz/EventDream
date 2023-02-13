<div class="table-responsive">
    <table class="table" id="venues-table">
        <thead>
        <tr>
            <th>Venuename</th>
        <th>Addressline1</th>
        <th>Addressline2</th>
        <th>City</th>
        <th>Eircode</th>
        <th>Humancapacity</th>
        <th>Costtorent</th>
        <th>Userid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($venues as $venue)
            <tr>
                <td>{{ $venue->venuename }}</td>
            <td>{{ $venue->addressline1 }}</td>
            <td>{{ $venue->addressline2 }}</td>
            <td>{{ $venue->city }}</td>
            <td>{{ $venue->eircode }}</td>
            <td>{{ $venue->humancapacity }}</td>
            <td>{{ $venue->costtorent }}</td>
            <td>{{ $venue->userid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['venues.destroy', $venue->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('venues.show', [$venue->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('venues.edit', [$venue->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
						<a href="{!! route('venueratings.ratevenue', [$venue->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="glyphicon glyphicon-star"></i>
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
