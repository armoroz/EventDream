@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
@foreach($products as $product) 
    @if ($j==0) <div class='row'> @endif 
        <div class="col-sm-4"> 
            <div class="panel panel-primary"> 
            <div class="panel-heading">{{ $product->name }} {{ $product->description }}</div> 
            <div class="panel-body"><img style="width:80%;height:200px;" class="img-responsive center-block" src="{{ asset('/img/' . $product->image)}}"/></div> 
            <div class="panel-footer"><button id="addItem" type="button" class="btn btn-default center-block addItem" value="{{$product->id}}">Add To Cart</button></div> 
        </div> 
    </div> 
    @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp </div> @endif 
@endforeach
@endsection('content')