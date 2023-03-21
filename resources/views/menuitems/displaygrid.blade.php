@extends('layouts.app')
@section('content')
@include('flash::message') 
@php $j=0 @endphp 
 
<style>
    .fixed-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }
	
	.checkbox {
        margin-left: 10px;
    }
	
	.btn-checkbox {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>-->

@foreach($menuitems as $menuitem) 
    @if ($j==0) <div class='row'> @endif 
        <div class="col-sm-4">
            <div class="panel panel-primary"> 
            <div class="panel-heading">{{ $menuitem->menuitemname }} {{ $menuitem->course }}</div> 
			<div class="panel-body"><img class="img-responsive center-block" height="100" width="100%" src="{{ $menuitem->menuitemimg }}"></div>
            <div class="panel-footer">
                <div class="btn-checkbox">
                    <div class="text-center">
                        <a href="{{ route('menuitems.custshow', [$menuitem->id]) }}"><button id="custshow" type="button" class="btn btn-default center-block custshow">Details</button></a>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="menuitems[]" value="{{ $menuitem->id }}">
                    </div>
                </div>
            </div>	
        </div>
	</div>
    @php $j++ @endphp 
    @if ($j==3) @php $j=0 @endphp </div> @endif 
@endforeach

<a href="{{ route('custommenus.create') }}" class="fixed-button">
    <button type="button" class="btn btn-primary">Add Menu Items to Custom Menu</button>
</a>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


@endsection('content')

