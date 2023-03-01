<div class="table-responsive">
    <table class="table" id="standardmenus-table">
        <thead>
        <tr>
            <th>Standardmenuname</th>
        <th>Style</th>
        <th>Course</th>
        <th>Description</th>
        <th>Userid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($standardmenus as $standardmenu)
            <tr>
                <td>{{ $standardmenu->standardmenuname }}</td>
            <td>{{ $standardmenu->style }}</td>
            <td>{{ $standardmenu->course }}</td>
            <td>{{ $standardmenu->description }}</td>
            <td>{{ $standardmenu->userid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['standardmenus.destroy', $standardmenu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('standardmenus.show', [$standardmenu->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('standardmenus.edit', [$standardmenu->id]) }}"
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
