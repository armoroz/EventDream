<div class="table-responsive">
    <table class="table" id="standardmenuimages-table">
        <thead>
        <tr>
            <th>Standardmenuid</th>
            <th>Image file</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($standardmenuimages as $standardmenuimages)
            <tr>
                <td>{{ $standardmenuimages->standardmenuid }}</td>
                <td>
				<img class="tableimg center-block" src="data:image/jpeg;base64,{{$standardmenuimages->imagefile}}"></td>
                <td width="120">
                    {!! Form::open(['route' => ['standardmenuimages.destroy', $standardmenuimages->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('standardmenuimages.show', [$standardmenuimages->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('standardmenuimages.edit', [$standardmenuimages->id]) }}"
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
