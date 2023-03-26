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
<form action="{{route('menuitems.newstandardmenu')}}" id="newmenuform" method="post">
@csrf
<div class='d-flex flex-wrap align-content-start bg-light'> 
@foreach($menuitems as $menuitem) 
        <div class="p-2 border col-4 g-3">
            <div class="card text-center"> 
            <div class="card-header d-block">{{ $menuitem->menuitemname }} {{ $menuitem->course }}</div> 
			<div class="card-body"><img class="img-responsive center-block" height="100" width="100%" src="{{ $menuitem->menuitemimglink }}"></div>
            <div class="card-footer">
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
@endforeach
</div>

    <button type="button" id="newmenubtn" class="btn btn-primary">Add Menu Items to Custom Menu</button>
</form>

<script>
$(document).ready(function(){
	console.log("ready");
});
$('#newmenubtn').click(function() {
    console.log('hello');
	$('#newmenuform').submit();
});
</script>

@endsection('content')