<div class="table-responsive">
    <table class="table" id="venues-table">
        <thead>
        <tr>
        <th>Name</th>
        <th>Address Line 1</th>
        <th>Address Line 2</th>
        <th>City</th>
        <th>Eircode</th>
		<th>Indoor (or Outdoor)</th>
        <th>Capacity</th>
        <th>Rent Price</th>
        <th>Client</th> 
		<th>Images</th>		
		<th>Average Rating</th>
		<th>Stars</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($venues as $venue)
            <tr>
                <td>{{ $venue->venuename }}</td>
            <td>{{ $venue->addressline1 }}</td>
            <td>{{ $venue->addressline2 }}</td>
            <td>{{ $venue->city }}</td>
            <td>{{ $venue->eircode }}</td>
			<td>{{ $venue->indoor }}</td>
            <td>{{ $venue->humancapacity }}</td>
            <td>{{ $venue->costtorent }}</td>
            <td>{{ $venue->user->customer->firstname ?? 'N/A'}}</td>
			<td>@foreach($venue->venueimages->take(1) as $venueimage)		
            <img class="tableimg center-block" src="data:image/jpeg;base64,{{$venueimage->imagefile}}">@endforeach</td>
			<td>{!! round($venue->venueratings->avg('rating'),2); !!}</td> 
			<td> <a href="{{ route('venueratings.showvenueratings', [$venue->id] )}}">
					<input id="fieldRating" name="rating" 
					value="{!! round($venue->venueratings->avg('rating'),2); !!}" 
					type="text" data-theme="krajee-fas" class="rating rating-loading" data-min=0 
					data-max=5 data-step=1 data-size="sm" data-display-only="true">
			     </a>
			</td>			
			
				<td width="120">
                    {!! Form::open(['route' => ['venues.destroy', $venue->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('venues.show', [$venue->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('venues.edit', [$venue->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="fas fa-edit"></i>
                        </a>
						<a href="{!! route('venueratings.ratevenue', [$venue->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="fas fa-star"></i>
						</a>
						<a href="{!! route('venue.newimages', [$venue->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="fas fa-images"></i>
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
