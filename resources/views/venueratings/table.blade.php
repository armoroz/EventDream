<div class="table-responsive">
    <table class="table" id="venueratings-table">
        <thead>
        <tr>
            <th>Rating</th>
			<th>Star Rating</th>
        <th>Comment</th>
        <th>Venueid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($venueratings as $venuerating)
            <tr>
                <td>{{ $venuerating->rating }}</td>
				<td><input id="fieldRating" name="rating" 
				value="{!! $venuerating->rating !!}"
				type="text" data-theme="krajee-fas" class="rating rating-loading" data-min=0 
				data-max=5 data-step=1 data-size="sm" data-display-only="true"></td>	
            <td>{{ $venuerating->comment }}</td>
            <td>{{ $venuerating->venueid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['venueratings.destroy', $venuerating->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('venueratings.show', [$venuerating->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('venueratings.edit', [$venuerating->id]) }}"
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
