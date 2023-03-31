@extends('layouts.app')
@section('content')


<h1 style="text-align: center; margin-top:250px;"> Your Order Has Been Placed!</h1>
<p style="text-align: center;">
<a href="{{ route('events.custindex', Auth::user()->customer->id) }}" class="btn btn-primary">View Orders</a>
</p>




@endsection('content')