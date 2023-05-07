<div class="table-responsive">
    <table class="table" id="standardmenulogs-table">
        <thead>
        <tr>
        <th>Menu Item ID</th>
        <th>Standard Menu ID</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($standardmenulogs as $standardmenulog)
            <tr>
                <td>{{ $standardmenulog->menuitemid }}</td>
            <td>{{ $standardmenulog->standardmenuid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['standardmenulogs.destroy', $standardmenulog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('standardmenulogs.show', [$standardmenulog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('standardmenulogs.edit', [$standardmenulog->id]) }}"
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
