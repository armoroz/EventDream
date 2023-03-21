@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

@foreach($menuitems as $menuitem) 
    @if ($j==0) <div class='row'> @endif 
        <div class="col-sm-4">
            <div class="panel panel-primary"> 
            <div class="panel-heading">{{ $menuitem->menuitemname }} {{ $menuitem->course }}</div> 
			<div class="panel-body"><img class="img-responsive center-block" height="100" width="100%" src="{{ $menuitem->menuitemimg }}"></div>
            <div class="panel-footer"><a  href="{{ route('menuitems.custshow', [$menuitem->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a></div>				
        </div>
	</div>
    @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp </div> @endif 
@endforeach


@endsection('content')