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
    <th>Deets</th>
    <th>Address</th>
    <th>Card</th>
  </tr>
  <tr>
    <td>{!! Form::label('firstname', 'Firstname:') !!} {{ $customer->firstname }}</td>
    <td>{!! Form::label('addressline1', 'Addressline1:') !!} {{ $customer->addressline1 }}</td>
    <td>{!! Form::label('cardno', 'Card No.') !!} {{ str_repeat('*', strlen($customer->cardno)) }}</td>
  </tr>
  <tr>
    <td>{!! Form::label('surname', 'Surname:') !!}{{ $customer->surname }}</td>
    <td>{!! Form::label('addressline2', 'Addressline2:') !!} {{ $customer->addressline2 }}</td>
    <td>{!! Form::label('cardexpiry', 'Card Expiry') !!} {{ str_repeat('*', strlen($customer->cardexpiry)) }}</td>
  </tr>
  <tr>
    <td>{!! Form::label('dob', 'Birthday:') !!} {{ $customer->dob }}</td>
    <td>{!! Form::label('city', 'City:') !!} {{ $customer->city }}</td>
    <td>{!! Form::label('cvv', 'CVV') !!} {{ str_repeat('*', strlen($customer->cvv)) }}</td>
  </tr>
  <tr>
    <td>{!! Form::label('phone', 'Phone:') !!} {{ $customer->phone }}</td>
    <td>{!! Form::label('eircode', 'Eircode:') !!} {{ $customer->eircode }}</td>
    <td></td>
  </tr>
  <tr>
    <td>{!! Form::label('email', 'Email:') !!} {{ $customer->email }}</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>