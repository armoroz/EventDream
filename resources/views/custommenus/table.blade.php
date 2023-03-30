<div class="table-responsive">
    <table class="table" id="custommenus-table">
        <thead>
        <tr>
            <th>Custommenuname</th>
        <th>Description</th>
		<th>Customer ID</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($custommenus as $custommenu)
            <tr>
                <td>{{ $custommenu->custommenuname }}</td>
            <td>{{ $custommenu->description }}</td>
			<td>{{ $custommenu->customerid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['custommenus.destroy', $custommenu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('custommenus.show', [$custommenu->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('custommenus.edit', [$custommenu->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
						<a href="{!! route('custommenus.assignmenuitems', [$custommenu->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="glyphicon glyphicon-cutlery" title="Update Dishes"></i>
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
