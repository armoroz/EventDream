<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
        <tr>
        <th>First Name</th>
        <th>Surname</th>
        <th>Date of Birth</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address Line 1</th>
        <th>Address Line 2</th>
        <th>City</th>
        <th>Eircode</th>
        <th>Card No.</th>
        <th>Card Expiry</th>
        <th>CVV</th>
        <th>Username</th>
        <th>Pass</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->firstname }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->dob }}</td>
            <td>{{ $customer->age }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->addressline1 }}</td>
            <td>{{ $customer->addressline2 }}</td>
            <td>{{ $customer->city }}</td>
            <td>{{ $customer->eircode }}</td>
            <td>{{ $customer->cardno }}</td>
            <td>{{ $customer->cardexpiry }}</td>
            <td>{{ $customer->cvv }}</td>
            <td>{{ $customer->username }}</td>
            <td>{{ $customer->pass }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customers.show', [$customer->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('customers.edit', [$customer->id]) }}"
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
