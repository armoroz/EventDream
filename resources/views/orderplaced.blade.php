@extends('layouts.app')
@section('content')


<h1 style="text-align: center; margin-top:250px;"> Your Order Has Been Placed!</h1>
<p style="text-align: center; font-weight: bold; font-size: 14pt;">We Look Forward To Making Your Event Come To Life</p>
<p style="text-align: center;">
<a href="{{ route('events.custindex', Auth::user()->customer->id) }}" class="btn btn-primary">View Events</a>
</p>




@endsection('content')