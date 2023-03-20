<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
        <tr>
            <th>Productname</th>
        <th>Producttype</th>
        <th>Productdesc</th>
        <th>Productcost</th>
        <th>Productlocation</th>
        <th>Productquantity</th>
        <th>Productimg</th>
        <th>Userid</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->productname }}</td>
            <td>{{ $product->producttype }}</td>
            <td>{{ $product->productdesc }}</td>
            <td>{{ $product->productcost }}</td>
            <td>{{ $product->productlocation }}</td>
            <td>{{ $product->productquantity }}</td>
			<td><img class="img-responsive center-block" 
			    style="max-height: 100px; min-height: 100px; max-width:100px; min-width: 100px;" src="{{ $product->productimg }}">
			</td>
            <td>{{ $product->userid }}</td>
			<td>
                <td width="120">
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', [$product->id]) }}"
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
