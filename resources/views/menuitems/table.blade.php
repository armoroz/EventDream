<div class="table-responsive">
    <table class="table" id="menuitems-table">
        <thead>
        <tr>
        <th>Name</th>
		<th>Course</th>
        <th>Description</th>
        <th>Nutrition</th>
        <th>Allergens</th>
        <th>Cost</th>
        <th>Image</th>
        <th>User ID</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menuitems as $menuitem)
            <tr>
            <td>{{ $menuitem->menuitemname }}</td>
			<td>{{ $menuitem->course }}</td>
            <td>{{ $menuitem->menuitemdesc }}</td>
            <td>{{ $menuitem->menuitemnutrition }}</td>
            <td>{{ $menuitem->menuitemallergens }}</td>
            <td>{{ $menuitem->menuitemcost }}</td>
			<td><img class="tableimg center-block" src="{{ $menuitem->menuitemimglink }}"></td>
            <td>{{ $menuitem->userid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['menuitems.destroy', $menuitem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('menuitems.show', [$menuitem->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('menuitems.edit', [$menuitem->id]) }}"
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
