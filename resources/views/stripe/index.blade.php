@extends('layouts.app')
@section('content')
@include('flash::message') 

<form action="{{route('stripe.checkout')}}" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<button type="submit">Checkout</button>
</form>


@endsection('content')