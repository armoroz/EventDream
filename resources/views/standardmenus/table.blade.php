<div class="table-responsive">
    <table class="table" id="standardmenus-table">
        <thead>
        <tr>
        <th>Name</th>
        <th>Style</th>
        <th>Course</th>
        <th>Description</th>
        <th>User ID</th>
        <th>Images</th>		
		<th>Average Rating</th>
		<th>Stars</th>
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
			<td>@foreach($standardmenu->standardmenuimages->take(1) as $standardmenuimage)		
            <img class="img-responsive center-block" style="max-height: 100px; min-height: 100px; max-width:150px; min-width: 150px;" src="data:image/jpeg;base64,{{$standardmenuimage->imagefile}}">@endforeach</td>
			<td>{!! round($standardmenu->standardmenuratings->avg('rating'),2); !!}</td> 
			<td> <a href="{{ route('standardmenuratings.showstandardmenuratings', [$standardmenu->id] )}}">
					<input id="fieldRating" name="rating" 
					value="{!! round($standardmenu->standardmenuratings->avg('rating'),2); !!}" 
					type="text" class="rating rating-loading" data-min=0 
					data-max=5 data-step=1 data-size="sm" data-display-only="true">
			     </a>
			</td>			
			
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
						<a href="{!! route('standardmenuratings.ratestandardmenu', [$standardmenu->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="fas fa-star"></i>
						</a>
						<a href="{!! route('standardmenu.newimages', [$standardmenu->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="fas fa-images"></i>
						</a>
						<a href="{!! route('standardmenus.assignmenuitems', [$standardmenu->id]) !!}" 
						   class='btn btn-default btn-xs'>
						   <i class="fas fa-drumstick-bite" title="Update Dishes"></i>
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
