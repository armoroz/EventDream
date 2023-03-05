<div class="table-responsive">
    <table class="table" id="standardmenuratings-table">
        <thead>
        <tr>
            <th>Rating</th>
			<th>Star Rating</th>
        <th>Comment</th>
        <th>Standardmenuid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($standardmenuratings as $standardmenurating)
            <tr>
                <td>{{ $standardmenurating->rating }}</td>
				<td><input id="fieldRating" name="rating" 
				value="{!! $standardmenurating->rating !!}"
				type="text" class="rating rating-loading" data-min=0 
				data-max=5 data-step=1 data-size="sm" data-display-only="true"></td>	
            <td>{{ $standardmenurating->comment }}</td>
            <td>{{ $standardmenurating->standardmenuid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['standardmenuratings.destroy', $standardmenurating->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('standardmenuratings.show', [$standardmenurating->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('standardmenuratings.edit', [$standardmenurating->id]) }}"
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
