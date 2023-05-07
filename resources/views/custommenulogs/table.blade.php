<div class="table-responsive">
    <table class="table" id="custommenulogs-table">
        <thead>
        <tr>
        <th>Menu Item ID</th>
        <th>Custom Menu ID</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($custommenulogs as $custommenulog)
            <tr>
                <td>{{ $custommenulog->menuitemid }}</td>
            <td>{{ $custommenulog->custommenuid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['custommenulogs.destroy', $custommenulog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('custommenulogs.show', [$custommenulog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('custommenulogs.edit', [$custommenulog->id]) }}"
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
