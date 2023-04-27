<div class="table-responsive">
    <table class="table" id="projects-table">
        <thead>
        <tr>
            <th>Eventdate</th>
        <th>Eventtime</th>
        <th>Orderplacedon</th>
        <th>Eventordertotal</th>
        <th>Eventdiscount</th>
        <th>Numofguests</th>
        <th>Venueid</th>
        <th>Customerid</th>
        <th>Userid</th>
        <th>Standardmenuid</th>
        <th>Custommenuid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->eventdate }}</td>
            <td>{{ $project->eventtime }}</td>
            <td>{{ $project->orderplacedon }}</td>
            <td>{{ $project->eventordertotal }}</td>
            <td>{{ $project->eventdiscount }}</td>
            <td>{{ $project->numOfGuests }}</td>
            <td>{{ $project->venueid }}</td>
            <td>{{ $project->customerid }}</td>
            <td>{{ $project->userid }}</td>
            <td>{{ $project->standardmenuid }}</td>
            <td>{{ $project->custommenuid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('projects.show', [$project->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('projects.edit', [$project->id]) }}"
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
