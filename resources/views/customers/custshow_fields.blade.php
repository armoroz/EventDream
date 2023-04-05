<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin: 4%;
}

td, th {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
}
</style>

<!-- Username Field -->
<div class="col-sm-12" style="font-size: 26pt; text-align: center; margin-bottom: 20px;">
    <p>{{ $customer->username }}</p>
</div>


<table>
  <tr>
    <th>Details</th>
    <th>Address</th>
    <th>Card Information</th>
  </tr>
  <tr>
    <td>{!! Form::label('firstname', 'Firstname:') !!} <strong>{{ $customer->firstname }}</strong></td>
    <td>{!! Form::label('addressline1', 'Addressline1:') !!} <strong>{{ $customer->addressline1 }}</strong></td>
    <td>{!! Form::label('cardno', 'Card No.') !!} <strong>{{ str_repeat('*', strlen($customer->cardno)) }}</strong></td>
  </tr>
  <tr>
    <td>{!! Form::label('surname', 'Surname:') !!} <strong>{{ $customer->surname }}</strong></td>
    <td>{!! Form::label('addressline2', 'Addressline2:') !!} <strong>{{ $customer->addressline2 }}</strong></td>
    <td>{!! Form::label('cardexpiry', 'Card Expiry') !!} <strong>{{ str_repeat('*', strlen($customer->cardexpiry)) }}</strong></td>
  </tr>
  <tr>
    <td>{!! Form::label('dob', 'Birthday:') !!} <strong>{{ $customer->dob }}</strong></td>
    <td>{!! Form::label('city', 'City:') !!} <strong>{{ $customer->city }}</strong></td>
    <td>{!! Form::label('cvv', 'CVV') !!} <strong>{{ str_repeat('*', strlen($customer->cvv)) }}</strong></td>
  </tr>
  <tr>
    <td>{!! Form::label('phone', 'Phone:') !!} <strong>{{ $customer->phone }}</strong></td>
    <td>{!! Form::label('eircode', 'Eircode:') !!} <strong>{{ $customer->eircode }}</strong></td>
    <td></td>
  </tr>
  <tr>
    <td>{!! Form::label('email', 'Email:') !!} <strong>{{ $customer->email }}</strong></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>