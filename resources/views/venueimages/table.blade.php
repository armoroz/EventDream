<div class="table-responsive">
    <table class="table" id="venueimages-table">
        <thead>
        <tr>
            <th>Venueid</th>
			<th>Imagefile</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($venueimages as $venueimages)
            <tr>
                <td>{{ $venueimages->venueid }}</td>
            <td>
            <img class="img-responsive center-block" height="200" width="100" 
                src="data:image/jpeg;base64,{{$venueimages->imagefile}}">
			</td>
                <td width="120">
                    {!! Form::open(['route' => ['venueimages.destroy', $venueimages->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('venueimages.show', [$venueimages->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('venueimages.edit', [$venueimages->id]) }}"
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
