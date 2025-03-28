<div class="table-responsive">
    <table class="table" id="roles-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Guard Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $roles)
            <tr>
                <td>{{ $roles->name }}</td>
            <td>{{ $roles->guard_name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['roles.destroy', $roles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
					    <a href="{{ route('roles.assignpermissions', [$roles->id]) }}" class='btn btn-default btn-xs' title="Assign permissions">
                            <i class="fas fa-unlock-alt"></i>
                        </a>
                        <a href="{{ route('roles.show', [$roles->id]) }}"
                           class='btn btn-default btn-xs' title="View">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('roles.edit', [$roles->id]) }}"
                           class='btn btn-default btn-xs' title="Edit">
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
