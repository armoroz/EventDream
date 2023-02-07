<div class="table-responsive">
    <table class="table" id="s-table">
        <thead>
        <tr>
            <th>Firstname</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Addressline1</th>
        <th>City</th>
        <th>Username</th>
        <th>Pass</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($s as $)
            <tr>
                <td>{{ $employee->firstname }}</td>
            <td>{{ $employee->surname }}</td>
            <td>{{ $employee->dob }}</td>
            <td>{{ $employee->age }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->city }}</td>
            <td>{{ $employee->username }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employee.show', [$employee->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employees.edit', [$employee->id]) }}"
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
